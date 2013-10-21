from eve import Eve
port = 5000
#host = 'videometadataapi.pimovi.com'
#host = '54.214.42.17'
host = 'ec2-54-214-42-17.us-west-2.compute.amazonaws.com'

app = Eve()

app.run(host=host, port=port)
