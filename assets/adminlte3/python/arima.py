import mysql.connector
import numpy as np 
import numpy.linalg as la
import pandas as pd 
import pmdarima as pm
import sys
from statsmodels.tsa.arima_model import ARIMA

mydb = mysql.connector.connect(
	host="localhost",
	user="root",
	passwd="",
	database="siramersmg"
	)

# barangkeluar = pd.read_sql("select jumlah from barang3 where barang_id = '5AD01'",
#	mydb)

# barangkeluar = pd.read_sql("select jumlah_keluar from barangkeluar where barang_id = '5AD01'",
#	mydb)

# barangkeluar = pd.read_sql("select sum(jumlah_keluar) from barangkeluar where barang_id = '5AD01' group by year(tanggal_keluar), quarter(tanggal_keluar)",
#	mydb,
#	coerce_float=True)

x = sys.argv[1]

barangkeluar = pd.read_sql("select sum(jumlah_keluar) from barangkeluar where barang_id = '"+x+"' group by year(tanggal_keluar), quarter(tanggal_keluar)",
	mydb,
	coerce_float=True)

print(barangkeluar)

model = pm.auto_arima(barangkeluar, start_p=1, start_q=1,
                      #test='adf',       # use adftest to find optimal 'd'
                      max_p=1, max_q=1, # maximum p and q
                      m=1,              # frequency of series
                      d=None,           # let model determine 'd'
                      seasonal=False,   # No Seasonality
                      start_P=0, 
                      D=0, 
                      trace=True,
                      error_action='ignore',  
                      suppress_warnings=True, 
                      stepwise=True)

#print(model.summary())

# train = model.fit(barangkeluar)

# print(train)

forecast = model.predict(n_periods=1, return_conf_int=True)

st = ''.join(str(forecast))

pr = ''.join(str(model.summary()))

mycursor = mydb.cursor()

sql = "insert into peramalan (barang_id, ARIMA, model, proses) values('"+x+"','"+st+"','ARIMA(0,0,1)','"+pr+"')"

mycursor.execute(sql)

mydb.commit()
