from flask import Flask, render_template, jsonify, send_file
from flask_cors import CORS
import json

app = Flask(__name__)
CORS(app)


@app.route('/', methods=['GET'])
def index():
    return send_file('C://xampp//htdocs//dv//map.php', mimetype='text/html')

@app.route('/map-data', methods=['GET'])
def get_map_data():
    # Read JSON data from the static folder
    with open('C://xampp//htdocs//dv//markers.json', encoding='utf-8') as f:
        map_data = json.load(f)

    return jsonify(map_data)

if __name__ == '__main__':
    app.run(debug=True)
