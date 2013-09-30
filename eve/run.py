from eve import Eve
port = 5000
host = '192.168.1.131'


app = Eve()

app.run(host=host, port=port)
