from eve import Eve
port = 5000
#host = 'videometadataapi.pimovi.com'
#host = '127.0.0.1'
host = 'ec2-54-214-42-17.us-west-2.compute.amazonaws.com'

app = Eve()
app.run(host=host, port=port)
#app.run()
