from flask_restful import Resource, reqparse
from db import services
from utils import get_data_by_page, get_page_count

parser = reqparse.RequestParser()
parser.add_argument("limit")


class Services(Resource):
    def get(self, page):
        args = parser.parse_args()
        limit = args['limit']
        return {
            "pages": get_page_count(services, limit),
            "data": get_data_by_page(services, page, limit),
        }
