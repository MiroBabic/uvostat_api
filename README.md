
# Dokumentácia API

## Prehľad
Táto dokumentácia poskytuje prehľad o API endpointoch vo vašej aplikácii Ruby on Rails. Obsahuje podrobnosti o tom, ako používať API, ako volať endpointy, dostupné filtračné parametre, očakávaný výstupný formát a URL adresy na volanie.

## Autentifikácia
Všetky API požiadavky vyžadujú hlavičku `ApiToken` pre autentifikáciu. Bez platného tokenu API vráti odpoveď `401 Unauthorized`.

### Príklad:

```http
GET /api/ukoncene_obstaravania HTTP/1.1
Host: yourdomain.com
ApiToken: your_api_token
```

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
GET /api/ukoncene_obstaravania?datum_zverejnenia_od=2022-01-01&datum_zverejnenia_do=2023-01-01&limit=50&offset=0
```
