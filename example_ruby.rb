require 'net/http'
require 'uri'

uri = URI.parse("<base_url>/api/ukoncene_obstaravania")
params = {
  "id[]" => ["1", "2"],
  "obstaravatel_id[]" => ["1"],
  "cpv[]" => ["73000000-2,45214100-1"],
  "datum_zverejnenia_od" => "2023-01-01",
  "datum_zverejnenia_do" => "2023-12-31",
  "limit" => "50",
  "offset" => "0"
}
uri.query = URI.encode_www_form(params)

http = Net::HTTP.new(uri.host, uri.port)
request = Net::HTTP::Get.new(uri.request_uri)
request["ApiToken"] = "<api_token>"

response = http.request(request)

puts response.body
