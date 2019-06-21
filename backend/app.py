from registration import Registration
from authentication import Authentication
from users import Users
from flask import Flask, request
from flask_restful import Resource, Api

app = Flask(__name__)
api = Api(app)

api.add_resource(Registration, '/registration')
api.add_resource(Authentication, '/authentication')
api.add_resource(Users, '/users/<string:token>')

if __name__ == '__main__':
    app.run(host='0.0.0.0')