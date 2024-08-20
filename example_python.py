import requests

headers = {
    'ApiToken': '<api_token>',
}

params = (
    ('id[]', ['1', '2']),
    ('obstaravatel_id[]', ['1']),
    ('cpv[]', ['73000000-2,45214100-1']),
    ('datum_zverejnenia_od', '2023-01-01'),
    ('datum_zverejnenia_do', '2023-12-31'),
    ('limit', '50'),
    ('offset', '0'),
)

response = requests.get('<base_url>/api/ukoncene_obstaravania', headers=headers, params=params)

print(response.json())
