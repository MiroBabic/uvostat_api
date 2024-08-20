
# Dokumentácia API

## Prehľad
Táto dokumentácia poskytuje prehľad o API endpointoch pre portál UVOstat.sk. Obsahuje podrobnosti o tom, ako používať API, ako volať endpointy, dostupné filtračné parametre, očakávaný výstupný formát a URL adresy na volanie.

## Autentifikácia
Všetky API požiadavky vyžadujú hlavičku `ApiToken` pre autentifikáciu. Bez platného tokenu API vráti odpoveď `401 Unauthorized`.


## Endpoints

### 1. Získanie ukončených obstarávaní

**Endpoint:** `/api/ukoncene_obstaravania`

**Metóda:** `GET`

**Popis:** Získa záznamy o ukončených obstarávaniach.

**Query parametre:**

- `id` (string, voliteľné): Čiarkou oddelený zoznam ID záznamov obstarávania na filtrovanie.
- `order_id` (string, voliteľné): Čiarkou oddelený zoznam ID objednávok na filtrovanie.
- `obstaravatel_id` (string, voliteľné): Čiarkou oddelený zoznam ID obstarávateľov na filtrovanie.
- `cpv` (string, voliteľné): Čiarkou oddelený zoznam CPV kódov na filtrovanie.
- `datum_zverejnenia_od` (date, voliteľné): Počiatočný dátum pre rozsah dátumov zverejnenia.
- `datum_zverejnenia_do` (date, voliteľné): Koncový dátum pre rozsah dátumov zverejnenia.
- `limit` (integer, voliteľné): Maximálny počet záznamov na vrátenie (predvolené: 100, maximum: 100).
- `offset` (integer, voliteľné): Offset pre stránkovanie (predvolené: 0).

**Príklad požiadavky:**

```http
GET /api/ukoncene_obstaravania?datum_zverejnenia_od=2022-01-01&datum_zverejnenia_do=2023-01-01&cpv[]=34121100-2&limit=50&offset=0
```

**Príklad odpovede:**

```json
{
    "summary": {
        "total_records": 599,
        "requested_records": 50,
        "offset": 0,
        "limit": "50",
        "order_by": "zaznam_vytvoreny asc",
        "min_created_at": "2022-03-30T00:00:08.510Z",
        "max_created_at": "2023-06-26T22:59:03.465Z"
    },
    "data": [
        {
            "id": 1696812,
            "order_id": 433314,
            "order_url": "http://www.uvo.gov.sk/vyhladavanie-zakaziek/detail/433314",
            "eaukcia": false,
            "formular": "OZNÁMENIE O VÝSLEDKU VEREJNÉHO OBSTARÁVANIA – VYBRANÉ ODVETVIA",
            "obstaravatel_id": 9282,
            "obstaravatel_meno": "Dopravný podnik Bratislava, akciová spoločnosť",
            "obstravatel_ico": "00492736",
            "rozdelenie_na_casti": false,
            "phz": null,
            "eufondy": false,
            "uspesne": false,
            "zaznam_vytvoreny": "2022-03-30T00:00:08.510Z",
            "zaznam_aktualizovany": "2022-03-30T00:00:08.510Z",
            "datum_zverejnenia": "2022-03-29T00:00:00.000Z",
            "rozsah": null,
            "rozsah_od": null,
            "rozsah_do": null,
            "mena": "",
            "nazov": "Nákup autobusov s dĺžkou do 12,2 m s CNG pohonom",
            "cpv": "34121100-2",
            "typ": "Tovary",
            "popis": "Predmetom zákazky je vyrobenie, dodanie a schválenie na prevádzku 80 ks nových nízkopodlažných (dvojnápravových) mestských autobusov s CNG pohonom, s celkovou obsaditeľnosťou min. 85 cestujúcich a dĺžkou max 12,2 metra vrátane riadiacich, kamerových, informačných a tarifných systémov.",
            "znacka": "NL 19/2021",
            "opcie": false,
            "kriteria_kvality": true,
            "naklady_cena": "Cena",
            "ramcova_dohoda": true,
            "kriteria": "",
            "kriteria_list": [],
            "zdroj": 1,
            "eks_id": null,
            "zmluvy": []
        },
        {
            "id": 1698418,
            "order_id": null,
            "order_url": "https://portal.eks.sk/SpravaZakaziek/Zakazky/Detail/321407",
            "eaukcia": null,
            "formular": null,
            "obstaravatel_id": 11050,
            "obstaravatel_meno": "Dopravný podnik mesta Košice, akciová spoločnosť",
            "obstravatel_ico": "31701914",
            "rozdelenie_na_casti": null,
            "phz": "2640.0",
            "eufondy": false,
            "uspesne": true,
            "zaznam_vytvoreny": "2022-05-06T00:49:02.990Z",
            "zaznam_aktualizovany": "2023-06-26T22:55:04.534Z",
            "datum_zverejnenia": "2022-03-16T09:20:29.000Z",
            "rozsah": null,
            "rozsah_od": null,
            "rozsah_do": null,
            "mena": "EUR",
            "nazov": "Náhradné diely na autobusy Sor NB12,NB18 - Hnacie ústrojenstvo",
            "cpv": "34121100-2",
            "typ": "Tovary",
            "popis": "Nákup náhradných dielov na autobusy Sor NB12,NB18 za účelom výmeny poškodených alebo opotrebovaných dielov za nové|~||~|Technické vlastnosti: 994591057174  FILTER VZDUCHU 4591057174, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 20; Technické vlastnosti: 99504026056  FILTER OLEJA MOTORA 47  W1170/7 504026056, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 25; Technické vlastnosti: 10X3FPM80   O-KRUZOK 10,0x3,0 na vysoké teploty do 250C°, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 100; Technické vlastnosti: 4891116/504  Kladka napínacia - klimatizácia, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 5; Technické vlastnosti: 99500393125  Vodné potrubie ( dvojvalcový kompresor ), Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 6; Technické vlastnosti: 995801415504  FILTRACNY PRVOK OLEJA CURSOR 9 EURO 6, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 10; Technické vlastnosti: 99504334915  FILTER ODVETRANIA MOTORA  CURSOR 9 EURO 6, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 10; Technické vlastnosti: 5801774731  FILTER PALIVOVY HRUBY CURSOR 9, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 8; Technické vlastnosti: 5801439820  FILTER PALIVOVY JEMNY CURSOR 9, Jednotka: ks, Minimum: , Maximum: , Presná hodnota: 8",
            "znacka": null,
            "opcie": null,
            "kriteria_kvality": null,
            "naklady_cena": null,
            "ramcova_dohoda": false,
            "kriteria": "Cena bez DPH",
            "kriteria_list": null,
            "zdroj": 2,
            "eks_id": "Z20222309",
            "zmluvy": [
                {
                    "zmluva_id": 337820,
                    "obstaravanie_id": 1698418,
                    "datum_uzavretia_zmluvy": "2022-03-21T08:54:00.000Z",
                    "pocet_ponuk": null,
                    "finalna_suma": "2639.9",
                    "mena": "EUR",
                    "dph": 20,
                    "dodavatel_id": 18769,
                    "eks_identifikator_zmluvy": "Z20222309_Z",
                    "casti": null,
                    "viac_dodavatelov": null,
                    "viac_dodavatelov_id": []
                }
            ]
        }
]
}
```
