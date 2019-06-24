from registration import Registration
from authentication import Authentication
from balance import Balance
from users import Users
from services import Services
from verification import Verification
from flask import Flask
from flask_cors import CORS
from flask_restful import Api


# def output_json(data, code, headers=None):
#     resp = make_response(json.dumps(data), code)
#     resp.headers["Access-Control-Allow-Origin"] = "*"
#     resp.headers.extend(headers or {})
#     return resp


# class Api(flask_restful.Api):
#     def __init__(self, *args, **kwargs):
#         super(Api, self).__init__(*args, **kwargs)
#         self.representations = {"application/json": output_json}


app = Flask(__name__)
cors = CORS(app, resoures={r"/api/*": {"origins": "*"}})
api = Api(app)

api.add_resource(Registration, "/registration")
api.add_resource(Authentication, "/authentication")
api.add_resource(Users, "/users/<string:token>")
api.add_resource(Balance, "/balance/<string:page>")
api.add_resource(Services, "/services/<string:page>")
api.add_resource(Verification, "/verification/<string:id>")

if __name__ == "__main__":
    app.run(host="0.0.0.0")
