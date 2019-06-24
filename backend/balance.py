from flask_restful import Resource, reqparse
from db import balance
from utils import get_data_by_page, get_page_count

parser = reqparse.RequestParser()
parser.add_argument("limit")


class Balance(Resource):
    def get(self, page):
        args = parser.parse_args()
        limit = args["limit"]
        return {
            "pages": get_page_count(balance, limit),
            "data": get_data_by_page(balance, page, limit),
        }
