<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peramalan extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Peramalan';
        $this->load->model('model_barang');
        $this->load->model('model_peramalan');
    }

    public function index()
    {
        /* 2020 12 05 */
        $nama_barang = $this->model_barang->getBarangData();
        $this->data['nama_barang'] = $nama_barang;
        $this->render_template('peramalan/variabel', $this->data);



        /*
        $barangkeluar_data = $this->model_barang->getRata2Data();
        $result = array();
        foreach ($barangkeluar_data as $k => $v) {
            $result[$k]['barangkeluar'] = $v;
            $barang_data = $this->model_barang->getBarangData($v['barang_id']);
            $result[$k]['barang'] = $barang_data;
        }

        $this->data['barangkeluar_data'] = $result;
        $this->render_template('peramalan/index', $this->data);
        */
    }

    public function ramal()
    {
        $peramalan_data = $this->model_peramalan->getPeramalanData();
        $result = array();
        foreach ($peramalan_data as $k => $v) {
            $result[$k]['peramalan'] = $v;
            $barang_data = $this->model_barang->getBarangData($v['barang_id']);
            $result[$k]['barang'] = $barang_data;
        }

        $this->data['peramalan_data'] = $result;
        $this->render_template('peramalan/ramal', $this->data);
    }

    public function variabel()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('konstanta', 'Konstanta', 'required');
        $this->form_validation->set_rules('et', 'et', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case

            $data = array(
                'et' => $this->input->post('et'),
                'konstanta' => $this->input->post('konstanta'),
                'barang_id' => $this->input->post('nama_barang')
            );

            $create = $this->model_peramalan->create($data);
            if ($create == true) {

                // now unavailable the slot

                if ($create == true) {
                    $this->session->set_flashdata('success', 'Successfully created');
                    redirect('peramalan/ramal', 'refresh');
                } else {
                    $this->session->set_flashdata('errors', 'Error occurred!!');
                    redirect('peramalan/variabel', 'refresh');
                }
            } else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('peramalan/variabel', 'refresh');
            }
        } else {
            $nama_barang = $this->model_barang->getBarangData();
            $this->data['nama_barang'] = $nama_barang;

            $this->render_template('peramalan/variabel', $this->data);
        }
    }


    /*public function hasil($id)
    {
        $peramalan_data = $this->model_peramalan->getPeramalanData($id);
        $result = array();
        foreach ($peramalan_data as $v) {
                'id'            = $v->id,
                'barang_id'     = $v->barang_id,
                'konstanta'     = $v->konstanta,
                'et'            =  $v->et,
        }

        return json_encode ($result);
        $this->data['peramalan_data'] = $result; 
        $this->render_template('peramalan/hasil', $this->data);
    }*/

    public function findRataBarangKeluarById()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|htmlspecialchars|required');
        if ($this->form_validation->run() === FALSE) {
            $data['success'] = FALSE;
            $data['message'] = validation_errors();
            $data['data'] = validation_errors();
            echo json_encode($data);
            return FALSE;
        }

        $res =  $this->model_barang->getRata2Data($this->input->post('id', TRUE));
        $rata = $res['rata2'];
        if ($rata) {
            $data['success'] = TRUE;
            $data['message'] = 'OK';
            $data['data'] = $rata;
        } else {
            $data['success'] = FALSE;
            $data['message'] = 'No Data';
            $data['data'] = NULL;
        }
        echo json_encode($data);
    }

    public function proses()
    {
        $this->form_validation->set_rules('nama_barang', 'ID', 'trim|htmlspecialchars|required');
        $this->form_validation->set_rules('et', 'ET', 'trim|htmlspecialchars|required|numeric');
        if ($this->form_validation->run() === FALSE) {
            $nama_barang = $this->model_barang->getBarangData();
            $data['nama_barang'] = $nama_barang;
            $data['success'] = FALSE;
            $data['message'] = validation_errors();
            $data['data'] = NULL;

            $this->render_template('peramalan/variabel', $data);
            return FALSE;
        }
        /* QUARTER | jumlah_keluar | ARIMA | ERROR | PE */

        // # get data barang keluar group querter order by tahun, quarter
        // | quarter | jumlah_keluar
        $idBarang = $this->input->post('nama_barang', TRUE);
        $dataBarang = $this->model_barang->getJumlahKeluarPerQuarter($idBarang);
        $baris = count($dataBarang);


        $dataProses = [];
        $koefisienProses = 0.1;

        // get rata2 (untuk kemudian dijadikan konstanta) jumlah_keluar
        $konstantaProses = 0;
        $tmp = 0;
        foreach ($dataBarang as $db) {
            $tmp += $db->jumlah_keluar;
        }
        $konstantaProses = $tmp / $baris;

        $tmpEt = $this->input->post('et', TRUE);
        $etProses = abs($tmpEt - $konstantaProses);

        for ($iBaris = 0; $iBaris < $baris; $iBaris++) {
            $tmpHasil = [];
            if ($iBaris == 0) {
                // # iterasi pertama
                // | ARIMA
                // sama dengan nilai konstanta proses               
                $arimaProses = $konstantaProses;

                // | ERROR
                // absolute(jumlah_keluar - ARIMA)
                $errorProses = 0;
                $errorProses = abs($dataBarang[$iBaris]->jumlah_keluar - $arimaProses);

                // | PE
                // ERROR / jumlah_keluar => dalam persen * 100
                $peProses = 0;
                $peProses = ($errorProses / $dataBarang[$iBaris]->jumlah_keluar) * 100;

                $tmpHasil = array(
                    'barang_id' => $dataBarang[$iBaris]->barang_id,
                    'tahun' => $dataBarang[$iBaris]->tahun,
                    'triwulan' => $dataBarang[$iBaris]->triwulan,
                    'jumlah_keluar' => $dataBarang[$iBaris]->jumlah_keluar,
                    'arima' => $arimaProses,
                    'error_proses' => $errorProses,
                    'pe_proses' => $peProses
                );

                $dataProses[] = $tmpHasil;
            } elseif ($iBaris > 0) {
                // # iterasi kedua +++                                
                // | ARIMA
                // (KONSTANTA + ET) - (KOEFISIEN TETAP * ERROR iterasi sebelumnya)
                $arimaProses = 0;
                $arimaProses = ($konstantaProses + $etProses) - ($koefisienProses * $dataProses[$iBaris - 1]['error_proses']);

                // | ERROR
                // absolute(jumlah_keluar - ARIMA)
                $errorProses = 0;
                $errorProses = abs($dataBarang[$iBaris]->jumlah_keluar - $arimaProses);

                // | PE
                // ERROR / jumlah_keluar => dalam persen * 100
                $peProses = 0;
                $peProses = ($errorProses / $dataBarang[$iBaris]->jumlah_keluar) * 100;

                $tmpHasil = array(
                    'barang_id' => $dataBarang[$iBaris]->barang_id,
                    'tahun' => $dataBarang[$iBaris]->tahun,
                    'triwulan' => $dataBarang[$iBaris]->triwulan,
                    'jumlah_keluar' => $dataBarang[$iBaris]->jumlah_keluar,
                    'arima' => $arimaProses,
                    'error_proses' => $errorProses,
                    'pe_proses' => $peProses
                );

                $dataProses[] = $tmpHasil;
            }
        }

        // # output setelah iterasi berakhir
        // | ARIMA
        // (KONSTANTA + ET) - (KOEFISIEN TETAP * ERROR iterasi sebelumnya)
        // MAPE = average dari total PE
        $tmpArima = 0;
        $tmpArima = ($konstantaProses + $etProses) - ($koefisienProses * $dataProses[count($dataProses) - 1]['error_proses']);

        $tmpMape = 0;
        foreach ($dataProses as $dp) {
            $tmpMape += $dp['pe_proses'];
        }
        $mape = $tmpMape / count($dataProses);


        $hasilProses = array(
            'koefisienProses' => $koefisienProses,
            'konstantaProses' => $konstantaProses,
            'etProses' => $etProses,
            'namaBarang' => $this->model_barang->getBarangData($dataProses[0]['barang_id'])['nama_barang'],
            'dataProses' => $dataProses,
            'arimaSelanjutnya' => $tmpArima,
            'mape' => $mape
        );


        // # save to database        
        $data = array(
            'et' => $tmpEt,
            'konstanta' => $konstantaProses,
            'barang_id' => $idBarang,
            'hasil' => $tmpArima
        );

        $create = $this->model_peramalan->create($data);


        $data['proses'] = $hasilProses;
        $this->render_template('peramalan/view_hasil', $data);
    }
}
