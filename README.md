
# Dokumentácia API

## Prehľad
Táto dokumentácia poskytuje prehľad o API endpointoch pre portál UVOstat.sk. Obsahuje podrobnosti o tom, ako používať API, ako volať endpointy, dostupné filtračné parametre, očakávaný výstupný formát a URL adresy na volanie.

## Autentifikácia
Všetky API požiadavky vyžadujú hlavičku `ApiToken` pre autentifikáciu. Bez platného tokenu API vráti odpoveď `401 Unauthorized`.

## Prístup
- Endpoint `/api/subjekty` je zdarma pre každého registrovaného používateľa s platným `ApiToken`.
- Ostatné API endpointy sú dostupné v rámci plateného API prístupu.

## Základná URL
```http
https://www.uvostat.sk
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

**Subdodávky vo výstupe:**

Každý záznam obsahuje aj polia `ma_subdodavatelov`, `pocet_subdodavatelov` a `subdodavatelia`. Ak pre výsledok obstarávania neexistujú spracované subdodávky, `subdodavatelia` je prázdne pole. Ak existujú, obsahuje naparsované údaje o hlavnom dodávateľovi, subdodávateľovi, podiele, hodnote a väzbe na zmluvu a zdrojový vestník.

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
        "limit": 50,
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
            "obstaravatel_ico": "00492736",
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
            "zmluvy": [],
            "ma_subdodavatelov": false,
            "pocet_subdodavatelov": 0,
            "subdodavatelia": []
        },
        {
            "id": 1698418,
            "order_id": null,
            "order_url": "https://portal.eks.sk/SpravaZakaziek/Zakazky/Detail/321407",
            "eaukcia": null,
            "formular": null,
            "obstaravatel_id": 11050,
            "obstaravatel_meno": "Dopravný podnik mesta Košice, akciová spoločnosť",
            "obstaravatel_ico": "31701914",
            "obstravatel_ico": "31701914",
            "rozdelenie_na_casti": null,
            "phz": 2640.0,
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
                    "finalna_suma": 2639.9,
                    "mena": "EUR",
                    "dph": 20,
                    "dodavatel_id": 18769,
                    "eks_identifikator_zmluvy": "Z20222309_Z",
                    "casti": null,
                    "viac_dodavatelov": null,
                    "viac_dodavatelov_id": []
                }
            ],
            "ma_subdodavatelov": true,
            "pocet_subdodavatelov": 1,
            "subdodavatelia": [
                {
                    "subdodavka_id": 1,
                    "obstaravanie_id": 1698418,
                    "zmluva_id": 337820,
                    "vestnik_data_json_id": 263,
                    "hlavny_dodavatel_id": 18769,
                    "hlavny_dodavatel_meno": "Hlavný dodávateľ s.r.o.",
                    "hlavny_dodavatel_ico": "12345678",
                    "hlavny_dodavatel_org_ref": "ORG-0001",
                    "subdodavatel_id": 98123,
                    "subdodavatel_meno": "Subdodávateľ s.r.o.",
                    "subdodavatel_ico": "87654321",
                    "subdodavatel_org_ref": "ORG-0002",
                    "identifikator_zmluvy": "CON-0001",
                    "identifikator_ponuky": "TEN-0001",
                    "popis": "Časť plnenia zmluvy realizovaná subdodávateľom",
                    "podiel_percent": 25.0,
                    "odhadovana_hodnota": 10000.0,
                    "mena": "EUR",
                    "zdrojove_polia": {},
                    "zaznam_vytvoreny": "2026-07-07T12:00:00.000Z",
                    "zaznam_aktualizovany": "2026-07-07T12:00:00.000Z"
                }
            ]
        },
.... ďalšie záznamy
]
}
```


### 2. Získanie vyhlásených obstarávaní

**Endpoint:** `/api/vyhlasene_obstaravania`

**Metóda:** `GET`

**Popis:** Získa záznamy o vyhlásených obstarávaniach.

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
GET /api/vyhlasene_obstaravania?cpv[]=34121100-2&obstaravatel_id[]=86958
```

**Príklad odpovede:**
```json
{
    "summary": {
        "total_records": 3,
        "requested_records": 3,
        "offset": 0,
        "limit": 100,
        "order_by": "zaznam_vytvoreny asc",
        "min_created_at": "2021-03-10T01:32:16.447Z",
        "max_created_at": "2023-10-04T00:30:15.128Z"
    },
    "data": [
        {
            "id": 110239,
            "order_id": 430754,
            "order_url": "http://www.uvo.gov.sk/vyhladavanie-zakaziek/detail/430754",
            "oc_zakazka": "1521715",
            "eaukcia": true,
            "chranena_dielna": false,
            "chranene_prac_miesto": false,
            "nazov": "Nákup a dodávka autobusov s cng pohonom pre potreby spoločnosti",
            "hlavne_cpv": "34121100-2",
            "dodatkove_cpv": [
                "34121400-5",
                "50100000-6"
            ],
            "obstaravatel_id": 86958,
            "obstaravatel_meno": "Dopravný podnik mesta Martin, s.r.o.",
            "obstaravatel_ico": "53560922",
            "obstravatel_ico": "53560922",
            "znacka": "DPMM/VO/1/2021",
            "datum_zverejnenia": "2021-03-09T00:00:00.000Z",
            "formular": "OZNÁMENIE O VYHLÁSENÍ VEREJNÉHO OBSTARÁVANIA",
            "typ": "Tovary",
            "phz": 9520000.0,
            "rozsah": null,
            "rozsah_od": null,
            "rozsah_do": null,
            "rozdelenie_na_casti": false,
            "eufondy": false,
            "nuts": "SK031",
            "lokalita": "Dopravný podnik mesta Martin, s. r. o., Námestie S. H. Vajanského 1/1, 036 01 Martin - katastrálne územie mesta",
            "popis": "Predmetom zákazky je dodávka nových, mestských, vysoko environmentálnych, nízko podlažných autobusov na pohon CNG (stlačený zemný plyn), spĺňajúcich platné zákony, normy a vyhlášky pre prihlásenie autobusov do evidencie na území SR a EÚ v dobe ich dodávky do Dopravného podniku mesta Martin, s. r. o. v počte 35 kusov. \nPodrobné vymedzenie realizácie predmetu zákazky tvorí časť B. Opis predmetu zákazky, v nadväznosti na technickú špecifikáciu predmetu zákazky a obchodné (zmluvné) podmienky, ktoré tvoria časť D. \"Obchodné podmienky dodania predmetu zákazky\" Súťažných podkladov.. Predmetom zákazky je dodávka 35 ks autobusov s príslušenstvom a vo výbave podľa priloženej technickej špecifikácie, ktorá tvorí Prílohu č.1 Kúpnej zmluvy pre potreby spoločnosti. \nVerejný obstarávateľ požaduje dodať nové, úplne nízko podlažné (dvojnápravové) autobusy mestskej hromadnej dopravy dĺžky 12 metrov s pohonom CNG /stlačený zemný plyn/ v počte 35 ks, vrátane riadiacich, kamerových, informačných, komunikačných a tarifných systémov (ďalej len autobusy alebo aj vozidlá, jednotlivo autobus alebo aj vozidlo, resp. súhrnne len tovar v príslušnom gramatickom tvare) bližšie špecifikované v Prílohe č. 1 tejto zmluvy, za stanovených podmienok v tejto zmluve, ktoré budú kompletne schválené na prevádzku v premávke na pozemných komunikáciách.\nPodrobné vymedzenie realizácie predmetu zákazky tvorí časť B. Opis predmetu zákazky, v nadväznosti na technickú špecifikáciu predmetu zákazky a obchodné (zmluvné) podmienky, ktoré tvoria časť D. \"Obchodné podmienky dodania predmetu zákazky\" Súťažných podkladov.",
            "kriteria_kvality": false,
            "naklady_cena": "Cena",
            "ramcova_dohoda": false,
            "kriteria": null,
            "kriteria_list": [],
            "sutazne_podmienky": null,
            "referencne_cislo": "DPMM/VO/1/2021",
            "dlzka_trvania": "v mesiacoch (od zadania zákazky) : 7",
            "postup": "Verejná súťaž",
            "zrychleny_postup": false,
            "dohoda_o_vladnom_obstaravani": null,
            "opakovane_obstaravanie": false,
            "doplnkove_informacie": "1. Verejný obstarávateľ umožňuje neobmedzený a priamy prístup elektronickými prostriedkami k všetkým poskytnutým dokumentom / informáciám počas lehoty na predkladanie ponúk. Verejný obstarávateľ bude všetky dokumenty uverejňovať ako elektronické dokumenty v príslušnej časti zákazky v systéme EVO.eBIT portal na portáli http://www.evoportal.sk/. Verejný obstarávateľ bude všetky dokumenty/informácie počas lehoty na predkladanie ponúk uverejňovať aj v profile VO.\nVzhľadom k tomu, že verejný obstarávateľ poskytuje neobmedzený prístup k súťažným podkladom a ostatným informáciám potrebných na vypracovanie ponuky, a to v profile verejného obstarávateľa na webovom sídle ÚVO (www.uvo.gov.sk) ako aj na portáli EVO.eBIT portal, stránka www.evoportal.sk, počas celého procesu verejného\nobstarávania, týmto odporúča všetkým záujemcom, aby vo vlastnom záujme počas celého procesu verejného obstarávania sledovali profil verejného obstarávateľa na uvedenom webovom sídle alebo portál EVO.eBIT portal.\n2. Predkladanie ponúk je umožnené iba registrovaným uchádzačom a ktorého verejný obstarávateľ zaregistroval do systému EVO portal schválením jeho žiadosti o registráciu, a ktorému systém EVO portal vygeneroval UID používateľa. Záujemcovia sa môžu zaregistrovať na adrese: http://www.evoportal.sk/index.php?zobraz=registracia; pokyny k registrácií sú uvedené priamo na tejto adrese.\n3. Ponuka musí byť vyhotovená elektronicky v zmysle § 49 ods. 1 písm. a) zákona o verejnom obstarávaní a vložená do systému EVO.eBIT portal umiestnenom na webovej adrese http://www.evoportal.sk/. Doklady a dokumenty tvoriace obsah ponuky, požadované v týchto súťažných podkladoch verejný obstarávateľ odporúča predložiť ako súbory pdf.\n4. Verejný obstarávateľ si vyhradzuje právo uzavrieť Kúpnu zmluvu na dodávku 35 kusov autobusov v stanovenej lehote viazanosti ponúk s druhým, resp. ďalším uchádzačom v poradí na základe výsledku pôvodnej elektronickej aukcie v prípade:\n- ak fyzická alebo právnická osoba vo fáze zadávania zákazky pred uzavretím zmluvy- úspešný uchádzač, odstúpi od svojej ponuky (odmietne podpísať Kúpnu zmluvu), resp. ponuka úspešného uchádzača (s použitím e - aukcie) bola opäť vyhodnocovaná alebo prebiehala konzultácia na základe predloženej najnižšej ceny,\nresp. s ktorou uzavrie zmluvu a stratí v priebehu jej plnenia schopnosť splniť si zmluvný záväzok v lehote viazanosti ponúk.\nVerejný obstarávateľ v tomto istom postupe zadávania zákazky na dodania predmetu zákazky vyberie nového úspešného uchádzača v lehote viazanosti ponúk a výsledok oznámi všetkým uchádzačom, ktorých ponuky sa vyhodnocovali.\n5. Verejný obstarávateľ upozorňuje záujemcov alebo uchádzačov, že je potrebné sa zaregistrovať do aukčného systému eBIT, pokiaľ už nie sú v aukčnom systéme registrovaní.\n6. Predpokladaný termín začatia elektronickej aukcie bude uchádzačom oznámený elektronicky vo výzve až po vyhodnotení ponúk a podmienok účasti, ktoré sú uvedené v časti F. Súťažných podkladov a verejný obstarávateľ predbežne stanovil termín konania e aukcie na dátum dňa 14.04. 2021. Za použité technické prostriedky a špecifikácie technického pripojenia počas etapy a priebehu elektronickej aukcie zodpovedajú uchádzači, nie vlastník domény.\n7. Verejný obstarávateľ si vyhradzuje právo zrušiť použitý postup zadávania nadlimitnej zákazky z dôvodov uvedených v § 57 ods. 1 a ods. 2 zákona o verejnom obstarávaní a v bode 31 Súťažných podkladov.\n8.Verejný obstarávateľ nesmie uzavrieť zmluvu, koncesnú zmluvu alebo rámcovú dohodu s uchádzačom alebo uchádzačmi, ktorí majú povinnosť zapisovať sa do registra partnerov verejného sektora a nie sú zapísaní v registri partnerov verejného sektora alebo ktorých subdodávatelia alebo subdodávatelia podľa osobitného predpisu, ktorí majú povinnosť zapisovať sa do registra partnerov verejného sektora a nie sú zapísaní v registri partnerov verejného sektora (§ 11 ZVO).\n9.Predmetné verejné obstarávanie z uvedených možností je zamerané na zelené verejné obstarávanie.",
            "zaznam_vytvoreny": "2021-03-10T01:32:16.447Z",
            "zaznam_aktualizovany": "2023-09-22T14:02:48.823Z",
            "rozdelenie_na_casti_list": [
                {
                    "nuts": "SK031",
                    "about": "Predmetom zákazky je dodávka 35 ks autobusov s príslušenstvom a vo výbave podľa priloženej technickej špecifikácie, ktorá tvorí Prílohu č.1 Kúpnej zmluvy pre potreby spoločnosti. \nVerejný obstarávateľ požaduje dodať nové, úplne nízko podlažné (dvojnápravové) autobusy mestskej hromadnej dopravy dĺžky 12 metrov s pohonom CNG /stlačený zemný plyn/ v počte 35 ks, vrátane riadiacich, kamerových, informačných, komunikačných a tarifných systémov (ďalej len autobusy alebo aj vozidlá, jednotlivo autobus alebo aj vozidlo, resp. súhrnne len tovar v príslušnom gramatickom tvare) bližšie špecifikované v Prílohe č. 1 tejto zmluvy, za stanovených podmienok v tejto zmluve, ktoré budú kompletne schválené na prevádzku v premávke na pozemných komunikáciách.\nPodrobné vymedzenie realizácie predmetu zákazky tvorí časť B. Opis predmetu zákazky, v nadväznosti na technickú špecifikáciu predmetu zákazky a obchodné (zmluvné) podmienky, ktoré tvoria časť D. \"Obchodné podmienky dodania predmetu zákazky\" Súťažných podkladov.",
                    "enddate": null,
                    "quality": "Nie",
                    "costprice": "Cena",
                    "startdate": null,
                    "finalplace": "Dopravný podnik mesta Martin, s. r. o., Námestie S. H. Vajanského 1/1, 036 01 Martin - katastrálne územie mesta",
                    "timelength": "v mesiacoch (od zadania zákazky) : 7",
                    "order_value": 9520000.0,
                    "order_currency": "EUR"
                }
            ],
            "rozdelenie_na_casti_pocet": 1,
            "lehota_na_predkladanie_ponuk": "2021-04-08T10:00:00.000Z",
            "jazyky": [
                "SK",
                "CS"
            ],
            "minimalna_lehota": "2021-08-31T00:00:00.000Z",
            "datum_otvarania_ponuk": null,
            "miesto_otvarania_ponuk": null,
            "otvaranie_ponuk_info": "Otváranie ponúk za dodanie predmetu zákazky v systéme EVO.eBIT portal komisiou je neverejné, koná sa bez účasti uchádzačov a zápisnica z otvárania ponúk sa uchádzačom neodosiela.\nPo vyhodnotení predložených dokladov a dokumentov, budú uchádzači, ktorí splnili podmienky účasti, elektronicky vyzvaní na predloženie nových cien prostredníctvom elektronickej aukcie.",
            "elektronicke_objednanie": false,
            "elektronicka_fakturacia": true,
            "elektronicke_platby": true,
            "mena": "EUR",
            "dph": "bez DPH"
        },
        {
            "id": 128656,
            "order_id": 464300,
            "order_url": "http://www.uvo.gov.sk/vyhladavanie/vyhladavanie-zakaziek/detail/464300",
            "oc_zakazka": "1555262",
            "eaukcia": true,
            "chranena_dielna": false,
            "chranene_prac_miesto": false,
            "nazov": "Nákup autobusov s CNG pohonom",
            "hlavne_cpv": "34121100-2",
            "dodatkove_cpv": [
                "34121100-2"
            ],
            "obstaravatel_id": 86958,
            "obstaravatel_meno": "Dopravný podnik mesta Martin, s.r.o.",
            "obstaravatel_ico": "53560922",
            "obstravatel_ico": "53560922",
            "znacka": "01_23",
            "datum_zverejnenia": "2023-04-18T00:00:00.000Z",
            "formular": "OZNÁMENIE O VYHLÁSENÍ VEREJNÉHO OBSTARÁVANIA – VYBRANÉ ODVETVIA",
            "typ": "Tovary",
            "phz": 1765717.5,
            "rozsah": null,
            "rozsah_od": null,
            "rozsah_do": null,
            "rozdelenie_na_casti": false,
            "eufondy": false,
            "nuts": "SK031",
            "lokalita": "Dopravný podnik mesta Martin, s.r.o., Flámska 1, 036 01 Martin",
            "popis": "Predmetom zákazky je dodávka tovaru - autobusy s CNG pohonom pre obstarávateľa Dopravný podnik mesta Martin, s. r. o. Podrobnejšie vymedzenie predmetu zákazky je uvedené v časti B. Opis predmetu zákazky súťažných podkladov.. Predmetom zákazky je dodávka tovaru - 5 ks mestských autobusov s CNG pohonom 12 m pre obstarávateľa Dopravný podnik mesta Martin, s. r. o. Podrobnejšie vymedzenie predmetu zákazky je uvedené v časti B. Opis predmetu zákazky súťažných podkladov",
            "kriteria_kvality": false,
            "naklady_cena": "Cena",
            "ramcova_dohoda": true,
            "kriteria": null,
            "kriteria_list": [],
            "sutazne_podmienky": null,
            "referencne_cislo": "01_23",
            "dlzka_trvania": "24",
            "postup": "Verejná súťaž",
            "zrychleny_postup": null,
            "dohoda_o_vladnom_obstaravani": true,
            "opakovane_obstaravanie": false,
            "doplnkove_informacie": "1. Postup zadávania zákazky nadlimitným postupom sa realizuje systémom elektronického verejného obstarávania prostredníctvom IS EVO na https://eplatforma.vlada.gov.sk/. Podmienkou pre úspešnú komunikáciu v IS EVO a preúspešné predkladanie ponúk je, aby uchádzač dodržal podmienky na softvér a hardvér výpočtovej techniky z ktorej bude odosielať súťažné podklady, aby mal uchádzač príslušné technické a odborné predpoklady, technické vybavenie a odborné ovládanie IS EVO. Potrebné technické vybavenie a požiadavky na používanie IS EVO sú zadefinované a zverejnené na portáli EVO (https://eplatforma.vlada.gov.sk). Obstarávateľ upozorňuje záujemcov, že neposkytuje súťažné podklady v listinnej podobe na základe písomnej alebo e-mailovej žiadosti záujemcu. Súťažné podklady sú sprístupnené záujemcom v IS EVO.\n2. Plynutie zákonných lehôt v prípade elektronickej komunikácie je odo dňa odoslania/doručenia správy. Pod pojmom doručenie sa myslí, kedy bola správa doručená uchádzačovi v IS EVO a nie kedy si ju uchádzač prečítal.\n3. ZÁBEZPEKA: Obstarávateľ vyžaduje od uchádzačov zábezpeku (viď súťažné podklady).\n4. Skutočnosti, ktoré môžu nastať v procese postupu zadávania zákazky, neupravené týmto oznámením a súťažnými podkladmi, sa riadia príslušnými ustanoveniami ZOVO.\n5.Vzhľadom na podmienky účasti, technické špecifikácie, kritériá na vyhodnotenie ponúk alebo podmienky plnenia zmluvy, nie je predmetné VO zelené, obstarávanie inovácií ani zamerané na sociálne aspekty. \n6.Verejný obstarávateľ alebo obstarávateľ môže kedykoľvek počas priebehu verejného obstarávania požiadať uchádzača o predloženie originálu príslušného dokumentu, úradne osvedčenej kópie originálu príslušného dokumentu, alebo zaručenej konverzie ak má pochybnosti o pravosti predloženého dokumentu alebo ak je to potrebné na zabezpečenie riadneho priebehu verejného obstarávania.\n7.Uchádzač predloží doklady preukazujúce splnenie podmienok účasti elektronickým spôsobom prostredníctvom systému IS EVO, alebo môže predbežne nahradiť vyššie uvedené doklady na preukázanie splnenia podmienok účasti určené obstarávateľom Jednotným európskym dokumentom (JED) podľa § 39 ZOVO. Obstarávateľ povoľuje, že uchádzač môže vyplniť len oddiel GLOBÁLNY ÚDAJ PRE VŠETKY PODMIENKY ÚČASTI časti IV JED bez toho, aby musel vyplniť iné oddiely časti IV JED.",
            "zaznam_vytvoreny": "2023-04-26T00:31:59.499Z",
            "zaznam_aktualizovany": "2023-09-22T14:46:31.326Z",
            "rozdelenie_na_casti_list": [
                {
                    "nuts": "SK031",
                    "about": "Predmetom zákazky je dodávka tovaru - 5 ks mestských autobusov s CNG pohonom 12 m pre obstarávateľa Dopravný podnik mesta Martin, s. r. o. Podrobnejšie vymedzenie predmetu zákazky je uvedené v časti B. Opis predmetu zákazky súťažných podkladov",
                    "enddate": null,
                    "quality": "Nie",
                    "costprice": "Cena",
                    "startdate": null,
                    "finalplace": "Dopravný podnik mesta Martin, s.r.o., Flámska 1, 036 01 Martin",
                    "timelength": "24",
                    "order_value": 1765717.5,
                    "order_currency": "EUR"
                }
            ],
            "rozdelenie_na_casti_pocet": 1,
            "lehota_na_predkladanie_ponuk": "2023-05-15T10:00:00.000Z",
            "jazyky": [
                "SK",
                "CS"
            ],
            "minimalna_lehota": null,
            "datum_otvarania_ponuk": null,
            "miesto_otvarania_ponuk": null,
            "otvaranie_ponuk_info": "Otváranie ponúk, t. j. sprístupnenie elektronických ponúk v IS EVO sa uskutoční podľa § 52 ZOVO. Pri použití elektronickej aukcie je otváranie ponúk neverejné, údaje z otvárania ponúk komisia nezverejňuje a neposiela uchádzačom ani zápisnicu z otvárania ponúk (§ 54 ods. 3 ZOVO).",
            "elektronicke_objednanie": true,
            "elektronicka_fakturacia": true,
            "elektronicke_platby": true,
            "mena": "EUR",
            "dph": "bez DPH"
        },
        {
            "id": 222724,
            "order_id": 482898,
            "order_url": "https://www.uvo.gov.sk/vyhladavanie/vyhladavanie-zakaziek/detail/482898",
            "oc_zakazka": "1573860",
            "eaukcia": true,
            "chranena_dielna": false,
            "chranene_prac_miesto": false,
            "nazov": "Nákup autobusov s CNG pohonom",
            "hlavne_cpv": "34121100-2",
            "dodatkove_cpv": [
                "34121100-2"
            ],
            "obstaravatel_id": 86958,
            "obstaravatel_meno": "Dopravný podnik mesta Martin, s.r.o.",
            "obstaravatel_ico": "53560922",
            "obstravatel_ico": "53560922",
            "znacka": "02_23",
            "datum_zverejnenia": "2023-10-03T00:00:00.000Z",
            "formular": "OZNÁMENIE O VYHLÁSENÍ VEREJNÉHO OBSTARÁVANIA – VYBRANÉ ODVETVIA",
            "typ": "Tovary",
            "phz": 3958300.0,
            "rozsah": null,
            "rozsah_od": null,
            "rozsah_do": null,
            "rozdelenie_na_casti": false,
            "eufondy": false,
            "nuts": "SK031",
            "lokalita": "Dopravný podnik mesta Martin, s.r.o., Flámska 1, 036 01 Martin",
            "popis": "Predmetom zákazky je dodávka tovaru - autobusy s CNG pohonom pre obstarávateľa Dopravný podnik mesta Martin, s. r. o. Podrobnejšie vymedzenie predmetu zákazky je uvedené v časti B. Opis predmetu zákazky súťažných podkladov.. Predmetom zákazky je dodávka tovaru - 10 ks mestských autobusov s CNG pohonom 12 m pre obstarávateľa Dopravný podnik mesta Martin, s. r. o. Podrobnejšie vymedzenie predmetu zákazky je uvedené v časti B. Opis predmetu zákazky súťažných podkladov",
            "kriteria_kvality": false,
            "naklady_cena": "Cena",
            "ramcova_dohoda": true,
            "kriteria": null,
            "kriteria_list": [],
            "sutazne_podmienky": null,
            "referencne_cislo": "02_23",
            "dlzka_trvania": "24",
            "postup": "Verejná súťaž",
            "zrychleny_postup": null,
            "dohoda_o_vladnom_obstaravani": true,
            "opakovane_obstaravanie": false,
            "doplnkove_informacie": "1. Postup zadávania zákazky nadlimitným postupom sa realizuje systémom elektronického verejného obstarávania\nprostredníctvom IS EVO na https://eplatforma.vlada.gov.sk/. Podmienkou pre úspešnú komunikáciu v IS EVO a\npre úspešné predkladanie ponúk je, aby uchádzač dodržal podmienky na softvér a hardvér výpočtovej techniky z ktorej bude odosielať súťažné podklady, aby mal uchádzač príslušné technické a odborné predpoklady, technické vybavenie a odborné ovládanie IS EVO. Potrebné technické vybavenie a požiadavky na používanie IS EVO sú zadefinované a zverejnené na portáli EVO (https://eplatforma.vlada.gov.sk). Obstarávateľ upozorňuje záujemcov, že neposkytuje súťažné podklady v listinnej podobe na základe písomnej alebo e-mailovej žiadosti záujemcu. Súťažné podklady sú sprístupnené záujemcom v IS EVO.\n2. Plynutie zákonných lehôt v prípade elektronickej komunikácie je odo dňa odoslania/doručenia správy. Pod pojmom\ndoručenie sa myslí, kedy bola správa doručená uchádzačovi v IS EVO a nie kedy si ju uchádzač prečítal.\n3. ZÁBEZPEKA: Obstarávateľ vyžaduje od uchádzačov zábezpeku (viď súťažné podklady).\n4. Skutočnosti, ktoré môžu nastať v procese postupu zadávania zákazky, neupravené týmto oznámením a súťažnými\npodkladmi, sa riadia príslušnými ustanoveniami ZOVO.\n5.Vzhľadom na podmienky účasti, technické špecifikácie, kritériá na vyhodnotenie ponúk alebo podmienky plnenia\nzmluvy, nie je predmetné VO zelené, obstarávanie inovácií ani zamerané na sociálne aspekty.\n6.Verejný obstarávateľ alebo obstarávateľ môže kedykoľvek počas priebehu verejného obstarávania požiadať \nuchádzača o predloženie originálu príslušného dokumentu, úradne osvedčenej kópie originálu príslušného dokumentu, alebo zaručenej konverzie ak má pochybnosti o pravosti predloženého dokumentu alebo ak je to potrebné na zabezpečenie riadneho priebehu verejného obstarávania.\n7.Uchádzač predloží doklady preukazujúce splnenie podmienok účasti elektronickým spôsobom prostredníctvom systému IS EVO, alebo môže predbežne nahradiť vyššie uvedené doklady na preukázanie splnenia podmienok účasti určené obstarávateľom Jednotným európskym dokumentom (JED) podľa § 39 ZOVO. Obstarávateľ povoľuje, že uchádzač môže vyplniť len oddiel GLOBÁLNY ÚDAJ PRE VŠETKY PODMIENKY ÚČASTI časti IV JED bez toho, aby musel vyplniť iné oddiely časti IV JED.",
            "zaznam_vytvoreny": "2023-10-04T00:30:15.128Z",
            "zaznam_aktualizovany": "2023-10-04T00:30:15.128Z",
            "rozdelenie_na_casti_list": [
                {
                    "nuts": "SK031",
                    "about": "Predmetom zákazky je dodávka tovaru - 10 ks mestských autobusov s CNG pohonom 12 m pre obstarávateľa Dopravný podnik mesta Martin, s. r. o. Podrobnejšie vymedzenie predmetu zákazky je uvedené v časti B. Opis predmetu zákazky súťažných podkladov",
                    "enddate": null,
                    "quality": "Nie",
                    "costprice": "Cena",
                    "startdate": null,
                    "finalplace": "Dopravný podnik mesta Martin, s.r.o., Flámska 1, 036 01 Martin",
                    "timelength": "24",
                    "order_value": 3958300.0,
                    "order_currency": "EUR"
                }
            ],
            "rozdelenie_na_casti_pocet": 1,
            "lehota_na_predkladanie_ponuk": "2023-11-02T10:00:00.000Z",
            "jazyky": [
                "CS",
                "SK"
            ],
            "minimalna_lehota": null,
            "datum_otvarania_ponuk": null,
            "miesto_otvarania_ponuk": null,
            "otvaranie_ponuk_info": "Otváranie ponúk, t. j. sprístupnenie elektronických ponúk v IS EVO sa uskutoční podľa § 52 ZOVO. Pri použití elektronickej aukcie je otváranie ponúk neverejné, údaje z otvárania ponúk komisia nezverejňuje a neposiela uchádzačom ani zápisnicu z otvárania ponúk (§ 54 ods. 3 ZOVO).",
            "elektronicke_objednanie": true,
            "elektronicka_fakturacia": true,
            "elektronicke_platby": true,
            "mena": "EUR",
            "dph": "bez DPH"
        }
    ]
}
```

### 3. Získanie obstarávateľov

**Endpoint:** `/api/obstaravatelia`

**Metóda:** `GET`

**Popis:** Získa informácie o obstarávateľoch.

**Query parametre:** 
- `id` (string, voliteľné): Čiarkou oddelený zoznam ID záznamov obstarávania na filtrovanie.
- `ico` (string, voliteľné): Čiarkou oddelený zoznam IČO identifikátora obstarávateľov.
- `limit` (integer, voliteľné): Maximálny počet záznamov na vrátenie (predvolené: 100, maximum: 100).
- `offset` (integer, voliteľné): Offset pre stránkovanie (predvolené: 0).

**Príklad požiadavky:**

```http
GET /api/obstaravatelia?ico[]=53560922,31701914
```

**Príklad odpovede:**
```json
{
    "summary": {
        "total_records": 2,
        "requested_records": 2,
        "offset": 0,
        "limit": 100,
        "order_by": "zaznam_vytvoreny asc",
        "min_created_at": "2016-11-28T22:39:54.183Z",
        "max_created_at": "2021-03-10T01:32:15.904Z"
    },
    "data": [
        {
            "id": 11050,
            "ico": "31701914",
            "email": "",
            "web": "",
            "obstaravatel_id": 11050,
            "uvo_obstaravatel_id": 8171,
            "obstaravatel_url": "http://www.uvo.gov.sk/vyhladavanie-profilov/detail/8171",
            "obstaravatel": "Dopravný podnik mesta Košice, akciová spoločnosť",
            "zaznam_vytvoreny": "2016-11-28T22:39:54.183Z",
            "zaznam_aktualizovany": "2023-09-02T00:30:52.589Z",
            "mesto": "Košice-Západ",
            "tel": ";"
        },
        {
            "id": 86958,
            "ico": "53560922",
            "email": "rumpelova@dpmmartin.sk",
            "web": "",
            "obstaravatel_id": 86958,
            "uvo_obstaravatel_id": 20751,
            "obstaravatel_url": "http://www.uvo.gov.sk/vyhladavanie-profilov/detail/20751",
            "obstaravatel": "Dopravný podnik mesta Martin, s.r.o.",
            "zaznam_vytvoreny": "2021-03-10T01:32:15.904Z",
            "zaznam_aktualizovany": "2023-08-04T00:00:14.028Z",
            "mesto": "Martin",
            "tel": "+421 908965189;;+421 917615641;"
        }
    ]
}
```


### 4. Získanie dodávateľov

**Endpoint:** `/api/dodavatelia`

**Metóda:** `GET`

**Popis:** Získa informácie o dodávateľoch.

**Query parametre:** 
- `id` (string, voliteľné): Čiarkou oddelený zoznam ID záznamov obstarávania na filtrovanie.
- `ico` (string, voliteľné): Čiarkou oddelený zoznam IČO identifikátora dodávateľov.
- `limit` (integer, voliteľné): Maximálny počet záznamov na vrátenie (predvolené: 100, maximum: 100).
- `offset` (integer, voliteľné): Offset pre stránkovanie (predvolené: 0).

**Príklad požiadavky:**

```http
GET /api/dodavatelia?ico[]=46456082
```

**Príklad odpovede:**
```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "offset": 0,
        "limit": 100,
        "order_by": "zaznam_vytvoreny asc",
        "min_created_at": "2016-11-28T22:34:43.801Z",
        "max_created_at": "2016-11-28T22:34:43.801Z"
    },
    "data": [
        {
            "id": 11460,
            "ico": "46456082",
            "email": "",
            "web": "",
            "dodavatel_id": 11460,
            "dodavatel": "BAU cargo s.r.o.",
            "mesto": "Žilina",
            "zaznam_vytvoreny": "2016-11-28T22:34:43.801Z",
            "zaznam_aktualizovany": "2019-09-17T01:15:32.914Z",
            "krajina": "SVK",
            "tel": ";"
        }
    ]
}
```


### 5. Získanie zmlúv z CRZ 

**Endpoint:** `/api/crz_zmluvy`

**Metóda:** `GET`

**Popis:** Získa záznamy o CRZ zmluvách vrátane zmlúv bez príloh. `summary.total_records` počíta každú zmluvu raz. Ak zadáte IČO objednávateľa aj dodávateľa, zmluva musí vyhovovať obom filtrom.

**Query parametre:**

- `objednavatel_ico` (string, voliteľné): Čiarkou oddelený zoznam IČO obstarávateľov na filtrovanie.
- `dodavatel_ico` (string, voliteľné): Čiarkou oddelený zoznam IČO dodávateľov na filtrovanie.
- `datum_zverejnenia_od` (date, voliteľné): Počiatočný dátum pre rozsah dátumov zverejnenia.
- `datum_zverejnenia_do` (date, voliteľné): Koncový dátum pre rozsah dátumov zverejnenia.
- `limit` (integer, voliteľné): Maximálny počet záznamov na vrátenie (predvolené: 100, maximum: 100).
- `offset` (integer, voliteľné): Offset pre stránkovanie (predvolené: 0).

**Príklad požiadavky:**

```http
GET /api/crz_zmluvy?objednavatel_ico[]=42085519&dodavatel_ico[]=51196603
```

**Príklad odpovede:**
```json
{
    "summary": {
        "total_records": 2,
        "requested_records": 2,
        "offset": 0,
        "limit": 100,
        "order_by": "zaznam_vytvoreny asc, id asc",
        "min_created_at": "2023-04-20T19:30:53.627Z",
        "max_created_at": "2024-03-06T20:31:53.545Z"
    },
    "data": [
        {
            "id": 3522744,
            "url": "https://crz.gov.sk/zmluva/7766869",
            "nazov_zmluvy": "202300006",
            "crz_id": "7766869",
            "objednavatel_meno": "Materská škola, Sabinovská 22A, Prešov",
            "dodavatel_meno": "HORESKO s.r.o.",
            "predmet_zmluvy": "Zmluva o dodaní potravinového tovaru",
            "datum_ucinnosti": "2023-04-20T00:00:00.000Z",
            "datum_platnosti_do": null,
            "suma_zmluvy": 0,
            "suma_celkovo": 0,
            "komentar": "",
            "datum_zverejnenia": "2023-04-19T15:45:15.000Z",
            "objednavatel_ico": "42085519",
            "stav_zmluvy": "Ok",
            "dodavatel_ico": "51196603",
            "dodavatel_adresa": "Prešov",
            "datum_podpisu": "2023-04-19T00:00:00.000Z",
            "popis": "",
            "chan": "2023-04-19T15:45:14.000Z",
            "prilohy": [
                {
                    "priloha_id": 7766877,
                    "nazov": "Zmluva o dodaní potravinového tovaru",
                    "subor": "",
                    "velkost_suboru": 0,
                    "subor_url": null,
                    "subor_2": "4080673.pdf",
                    "velkost_suboru_2": 144095,
                    "subor_2_url": "https://www.crz.gov.sk/data/att/4080673.pdf",
                    "chan": "2023-04-19T15:45:14.000Z"
                }
            ]
        },
        {
            "id": 4086080,
            "url": "https://crz.gov.sk/zmluva/9006535",
            "nazov_zmluvy": "202400002/2024",
            "crz_id": "9006535",
            "objednavatel_meno": "Materská škola Sabinovská",
            "dodavatel_meno": "HORESKO s.r.o.",
            "predmet_zmluvy": "Zmluva o dodaní potravinového tovaru",
            "datum_ucinnosti": "2024-03-06T00:00:00.000Z",
            "datum_platnosti_do": "2024-10-31T00:00:00.000Z",
            "suma_zmluvy": 0,
            "suma_celkovo": 0,
            "komentar": "",
            "datum_zverejnenia": "2024-03-05T13:55:06.000Z",
            "objednavatel_ico": "42085519",
            "stav_zmluvy": "Ok",
            "dodavatel_ico": "51196603",
            "dodavatel_adresa": "Strojnícka 7223/19, Prešov, 08006",
            "datum_podpisu": "2024-01-16T00:00:00.000Z",
            "popis": "",
            "chan": "2024-03-05T13:55:06.000Z",
            "prilohy": [
                {
                    "priloha_id": 9006537,
                    "nazov": "HORESKO, S.R.O.",
                    "subor": "4798554.pdf",
                    "velkost_suboru": 0,
                    "subor_url": "https://www.crz.gov.sk/data/att/4798554.pdf",
                    "subor_2": "",
                    "velkost_suboru_2": 0,
                    "subor_2_url": null,
                    "chan": "2024-03-05T13:55:06.000Z"
                }
            ]
        }
    ]
}
```

### 6. Získanie súhrnných správ

**Endpoint:** `/api/suhrnne_spravy`

**Metóda:** `GET`

**Popis:** Získa normalizované súhrnné správy z vestníka VO vrátane zákaziek a zmlúv uvedených v správe.

**Query parametre:**

- `obstaravatel_ico` (string, voliteľné): Čiarkou oddelený zoznam IČO obstarávateľov na filtrovanie.
- `dodavatel_ico` (string, voliteľné): Čiarkou oddelený zoznam IČO dodávateľov uvedených v zákazkách súhrnnej správy.
- `datum_zverejnenia_od` (date, voliteľné): Počiatočný dátum pre rozsah dátumov zverejnenia.
- `datum_zverejnenia_do` (date, voliteľné): Koncový dátum pre rozsah dátumov zverejnenia.
- `limit` (integer, voliteľné): Maximálny počet správ na vrátenie (predvolené: 100, maximum: 100).
- `offset` (integer, voliteľné): Offset pre stránkovanie (predvolené: 0).

**Príklad požiadavky:**

```http
GET /api/suhrnne_spravy?obstaravatel_ico[]=00306177&dodavatel_ico[]=35763469&datum_zverejnenia_od=2024-01-01&limit=10&offset=0
```

**Príklad odpovede:**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "total_contracts": 2,
        "requested_contracts": 2,
        "offset": 0,
        "limit": 10,
        "order_by": "zaznam_vytvoreny asc",
        "min_created_at": "2024-04-10T12:00:00.000Z",
        "max_created_at": "2024-04-10T12:00:00.000Z",
        "min_datum_zverejnenia": "2024-04-09T00:00:00.000Z",
        "max_datum_zverejnenia": "2024-04-09T00:00:00.000Z"
    },
    "data": [
        {
            "id": 12345,
            "uvo_document_id": 987654,
            "vestnik_data_json_id": 263,
            "obstaravatel_id": 1001,
            "typ_oznamenia": "Súhrnná správa",
            "oprava": false,
            "evidencne_cislo_oznamenia": "12345 - IPS",
            "typ_suhrnnej_spravy": "Súhrnná správa o zákazkách s nízkou hodnotou",
            "verzia_spravy": "01",
            "datum_odoslania": "2024-04-08T00:00:00.000Z",
            "obdobie_polrok": 1,
            "obdobie_rok": 2024,
            "vestnik_poradie": 70,
            "vestnik_rok": 2024,
            "datum_zverejnenia": "2024-04-09T00:00:00.000Z",
            "obstaravatel_meno": "Mesto Príklad",
            "obstaravatel_ico": "00306177",
            "obstaravatel_dic": "2020123456",
            "obstaravatel_ulica": "Hlavná",
            "obstaravatel_cislo": "1",
            "obstaravatel_mesto": "Príklad",
            "obstaravatel_psc": "01001",
            "obstaravatel_krajina": "SVK",
            "obstaravatel_kontakt_meno": "Ján Novák",
            "obstaravatel_email": "kontakt@example.sk",
            "obstaravatel_tel": "+421900000000",
            "obstaravatel_url": "https://example.sk",
            "druh_zakazky": "Služby",
            "doplnujuci_druh_zakazky": null,
            "kod_opravy": null,
            "odovodnenie_opravy": null,
            "zhrnutie_opravy": null,
            "odkaz_na_predchadzajucu_verziu": null,
            "pocet_zakaziek": 2,
            "zakazky": [
                {
                    "id": 555,
                    "uvo_document_id": 987654,
                    "dodavatel_id": 11460,
                    "externe_id_zakazky": "1/2024",
                    "nazov_zakazky": "Dodanie služieb",
                    "druh_zakazky": "Služby",
                    "doplnujuci_druh_zakazky": null,
                    "vynimka": null,
                    "ramcova_dohoda": false,
                    "pocet_ponuk": 3,
                    "pocet_ponuk_msp": 2,
                    "pocet_ponuk_elektronicky": 3,
                    "identifikator_zmluvy": "ZML-1/2024",
                    "nazov_zmluvy": "Zmluva o dodaní služieb",
                    "datum_uzavretia_zmluvy": "2024-03-20T00:00:00.000Z",
                    "url_zmluvy": "https://example.sk/zmluva",
                    "typ_hodnoty": "value",
                    "hodnota": 12000.0,
                    "najnizsia_ponuka": 11000.0,
                    "najvyssia_ponuka": 14000.0,
                    "mena": "EUR",
                    "dodavatel_meno": "Dodávateľ, s.r.o.",
                    "dodavatel_ico": "35763469",
                    "dodavatel_dic": "2020123456",
                    "dodavatel_ulica": "Dodávateľská",
                    "dodavatel_cislo": "10",
                    "dodavatel_mesto": "Bratislava",
                    "dodavatel_psc": "81101",
                    "dodavatel_krajina": "SVK",
                    "dodavatel_kontakt_meno": null,
                    "dodavatel_email": null,
                    "dodavatel_tel": null,
                    "dodavatel_url": null,
                    "dodavatel_msp": true,
                    "doplnujuce_informacie": null,
                    "fingerprint": "summary-report-contract-fingerprint",
                    "zaznam_vytvoreny": "2024-04-10T12:00:00.000Z",
                    "zaznam_aktualizovany": "2024-04-10T12:00:00.000Z"
                }
            ],
            "zaznam_spracovany": "2024-04-10T12:05:00.000Z",
            "zaznam_vytvoreny": "2024-04-10T12:00:00.000Z",
            "zaznam_aktualizovany": "2024-04-10T12:00:00.000Z"
        }
    ]
}
```

### 7. Získanie účtovných závierok z RÚZ

**Endpoint:** `/api/ruz_zavierky`

**Metóda:** `GET`

**Popis:** Získa detailné dáta z registra účtovných závierok (RÚZ) pre konkrétny subjekt podľa IČO. Dáta sú štruktúrované po jednotlivých výkazoch, sekciách a riadkoch, pričom hodnoty sú zoskupené po rokoch.

**Query parametre:**

- `ico` (string, povinné): Osemmiestne IČO subjektu vrátane úvodných núl. Medzery medzi číslicami sa ignorujú.
- `iba_vyplnene` (boolean, voliteľné): Ak je nastavené na `true`, vo výstupe budú iba riadky, ktoré majú vyplnenú aspoň jednu hodnotu. Predvolené: `false`.
- `limit` (integer, voliteľné): Maximálny počet rokov, ktoré sa majú zahrnúť do výstupu. Predvolené: `1`, maximum: `100`.

**Príklad požiadavky:**

```http
GET /api/ruz_zavierky?ico=35815256&iba_vyplnene=true&limit=5
```

**Príklad odpovede:**

```json
{
    "summary": {
        "ico": "35815256",
        "years_count": 2,
        "templates_count": 2,
        "sections_count": 4,
        "rows_count": 128,
        "iba_vyplnene": true,
        "limit": 5
    },
    "data": {
        "ico": "35815256",
        "fin_mode": "company",
        "iba_vyplnene": true,
        "years": [
            2024,
            2023
        ],
        "year_headers": [
            "2024",
            "2023"
        ],
        "year_headers_by_year": {
            "2024": "2024",
            "2023": "2023"
        },
        "accounting_unit": {
            "ruz_id": 123456,
            "ico": "35815256",
            "dic": "2020259802",
            "accounting_unit_name": "Príklad, s.r.o.",
            "city": "Bratislava",
            "street": "Príkladná 1",
            "zip_code": "81101",
            "county": "Bratislavský",
            "district": "Bratislava I",
            "site": "https://example.sk",
            "establish_date": "2001-05-14",
            "last_update_date": "2025-02-01",
            "legal_form": 112,
            "org_size": "small",
            "ownership_type": 1,
            "sk_nace": "62010",
            "consolidated": false,
            "status": "active",
            "data_source": "ruz"
        },
        "statements": [
            {
                "year": 2024,
                "year_header": "2024",
                "filling_date": "2025-03-20",
                "compilation_date": "2025-03-15",
                "reports_count": 2,
                "reports": [
                    {
                        "ruz_accounting_report_id": 987654,
                        "ruz_template_id": 101,
                        "template_name": "Súvaha Úč POD 1-01",
                        "term_from": "2024-01-01",
                        "term_to": "2024-12-31",
                        "previous_term_from": "2023-01-01",
                        "previous_term_to": "2023-12-31",
                        "data_source": "ruz"
                    }
                ]
            }
        ],
        "templates": [
            {
                "name": "Súvaha Úč POD 1-01",
                "label": "Súvaha",
                "category": "balance_sheet",
                "years": [
                    2024,
                    2023
                ],
                "sections": [
                    {
                        "type": "Strana aktív",
                        "rows": [
                            {
                                "oznacenie": "001",
                                "cislo_riadku": 1,
                                "text": "SPOLU MAJETOK",
                                "values_by_year": {
                                    "2024": 1250000,
                                    "2023": 1180000
                                }
                            },
                            {
                                "oznacenie": "002",
                                "cislo_riadku": 2,
                                "text": "Neobežný majetok",
                                "values_by_year": {
                                    "2024": 540000,
                                    "2023": 510000
                                }
                            }
                        ]
                    }
                ]
            },
            {
                "name": "Výkaz ziskov a strát Úč POD 2-01",
                "label": "Výkaz ziskov a strát",
                "category": "income_statement",
                "years": [
                    2024,
                    2023
                ],
                "sections": [
                    {
                        "type": "Výkaz ziskov a strát",
                        "rows": [
                            {
                                "oznacenie": "01",
                                "cislo_riadku": 1,
                                "text": "Tržby z predaja tovaru",
                                "values_by_year": {
                                    "2024": 350000,
                                    "2023": 320000
                                }
                            }
                        ]
                    }
                ]
            }
        ]
    }
}
```

### 8. Získanie základných údajov o firme z RPO

**Endpoint:** `/api/subjekty`

**Metóda:** `GET`

**Popis:** Získa základné a rýchlo dostupné údaje o firme podľa IČO z tabuľky `RpoEntity` a doplní údaje o DPH z `RuzVatEntity`.

**Prístup:** Tento endpoint je zdarma pre každého registrovaného používateľa s platným `ApiToken`.

**Query parametre:**

- `ico` (string, povinné): Osemmiestne IČO subjektu vrátane úvodných núl. Medzery medzi číslicami sa ignorujú.

**Príklad požiadavky:**

```http
GET /api/subjekty?ico=35815256
```

**Príklad odpovede:**

```json
{
    "summary": {
        "ico": "35815256",
        "free_access": true,
        "source": "rpo_entities"
    },
    "data": {
        "rpo_id": 251445,
        "ico": "35815256",
        "dic": "2020259802",
        "nazov": "Príklad, s.r.o.",
        "pravna_forma_kod": "112",
        "pravna_forma": "Spoločnosť s ručením obmedzeným",
        "status": "active",
        "mesto": "Bratislava",
        "ulica": "Príkladná 1",
        "psc": "81101",
        "krajina": "Slovensko",
        "nace_kod": "62010",
        "nace": "Počítačové programovanie",
        "zaznam_aktualizovany": "2026-03-31T08:00:00.000Z",
        "dph": {
            "ic_dph": "SK2020259802",
            "platitel_dph": true,
            "druh_registracie_dph": "§4",
            "datum_registracie_dph": "2004-05-01",
            "datum_zmeny_druhu_registracie_dph": null,
            "platnost_od": "2004-05-01",
            "platnost_do": null,
            "zaznam_aktualizovany": "2026-03-30T22:10:00.000Z"
        }
    }
}
```

### 9. Získanie projektov ITMS21+

**Endpoint** `/api/itms21_projekty`

**Metóda** `GET`

**Popis** Získa projekty ITMS21+ s prijímateľom, výzvou, programom, prioritami, zmluvnými sumami a dostupnými detailmi realizácie. Pole `id` je zdrojové ID projektu. Priority vychádzajú zo špecifických cieľov projektu a `dostupny_v_zdroji` vyjadruje stav podľa posledného importu. Pri chýbajúcom detaile je dostupný základný záznam.

**Query parametre**

- `id[]` (integer[], voliteľné) – Zdrojové ID projektov ITMS21+.
- `kod[]` (string[], voliteľné) – Kódy projektov.
- `stav[]` (string[], voliteľné) – Stavy projektov.
- `prijimatel_ico[]` (string[], voliteľné) – IČO prijímateľov.
- `vyhlasovatel_ico[]` (string[], voliteľné) – IČO vyhlasovateľov výziev.
- `program[]` (string[], voliteľné) – Kódy alebo slovenské názvy programov.
- `priorita_kod[]` (string[], voliteľné) – Kódy priorít.
- `priorita_nazov[]` (string[], voliteľné) – Slovenské názvy priorít.
- `vyzva_kod[]` (string[], voliteľné) – Kódy výziev.
- `vyzva_nazov[]` (string[], voliteľné) – Slovenské názvy výziev.
- `vyzva_typ[]` (string[], voliteľné) – Typy výziev.
- `vyzva_stav[]` (string[], voliteľné) – Stavy výziev `zrusena`, `uzavreta`, `pozastavena` alebo `vyhlasena`.
- `datum_zaciatku_realizacie_od` (date, voliteľné) – Dolná hranica skutočného začiatku realizácie vrátane.
- `datum_zaciatku_realizacie_do` (date, voliteľné) – Horná hranica skutočného začiatku realizácie vrátane.
- `datum_konca_realizacie_od` (date, voliteľné) – Dolná hranica skutočného konca realizácie vrátane.
- `datum_konca_realizacie_do` (date, voliteľné) – Horná hranica skutočného konca realizácie vrátane.
- `limit` (integer, voliteľné) – Maximálny počet výsledkov na vrátenie (predvolené 100, maximum 100).
- `offset` (integer, voliteľné) – Počet preskočených výsledkov (predvolené 0).

Textové filtre porovnávajú celé hodnoty bez ohľadu na veľkosť písmen. Všetky zoznamy ITMS21+ sú zoradené podľa dátumu vytvorenia a pri rovnakom dátume podľa zdrojového ID. Záznamy bez dátumu vytvorenia sú na konci.

**Príklad požiadavky**

```http
GET /api/itms21_projekty?prijimatel_ico[]=00123456&limit=20&offset=0
```

**Príklad odpovede**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "offset": 0,
        "limit": 20,
        "order_by": "zaznam_vytvoreny asc, id asc",
        "min_created_at": "2025-05-20T08:00:00.000Z",
        "max_created_at": "2025-05-20T08:00:00.000Z"
    },
    "data": [
        {
            "kod": "401101A001",
            "nazov": "Obnova obecnej budovy",
            "stav": "V realizácii",
            "zameranie_projektu": null,
            "celkova_zazmluvnena_suma": 120000.0,
            "zazmluvnena_suma_nfp": 108000.0,
            "poskytnute_prostriedky": 35000.0,
            "skutocna_realizacia_zaciatok": "2025-07-01T08:00:00.000Z",
            "skutocna_realizacia_koniec": null,
            "planovana_realizacia_zaciatok": "2025-07-01T08:00:00.000Z",
            "planovana_realizacia_koniec": "2025-12-31T08:00:00.000Z",
            "datum_zaciatku_hlavnych_aktivit": null,
            "datum_konca_hlavnych_aktivit": null,
            "cislo_zmluvy": "NFP-2025-001",
            "priority": [
                {
                    "id": 12,
                    "kod": "P2",
                    "nazov": "Zelenšia Európa"
                }
            ],
            "specificke_ciele": [
                {
                    "id": 13,
                    "kod": "RSO2.1"
                }
            ],
            "opatrenia": null,
            "zonfp": null,
            "miesta_realizacie": null,
            "popis": "Zateplenie a výmena okien.",
            "popis_vychodiskovej_situacie": null,
            "popis_sposobu_realizacie": null,
            "popis_situacie_po_realizacii": null,
            "popis_kapacity_prijimatela": null,
            "aktivity": [
                {
                    "id": 1201,
                    "datumKoncaPlanovany": "2025-12-30T23:00:00.000Z"
                }
            ],
            "ukazovatel_vystupu": null,
            "ukazovatel_vysledku": null,
            "oblast_intervencie": null,
            "polozky_rozpoctu": null,
            "monitorovacie_terminy": [
                {
                    "terminMonitorovania": "2025-12-31",
                    "datumPredlozeniaNajneskorsi": "2026-01-31"
                }
            ],
            "id": 901,
            "zdroj": "ITMS21+",
            "zaznam_vytvoreny": "2025-05-20T08:00:00.000Z",
            "zaznam_aktualizovany": "2025-07-08T12:00:00.000Z",
            "dostupny_v_zdroji": true,
            "prijimatel": {
                "meno": "Mesto Príklad",
                "ico": "00123456",
                "dic": "2020123456"
            },
            "vyzva": {
                "id": 42,
                "kod": "PSK-PRIKLAD-01",
                "nazov": "Energetická obnova verejných budov",
                "typ": "Dopytová",
                "stav": "vyhlasena",
                "druh": null,
                "datum_vyhlasenia": "2025-01-10T09:00:00.000Z",
                "datum_ukoncenia": "2025-06-30T12:00:00.000Z",
                "vyhlasovatel_meno": "Orgán programu Príklad",
                "vyhlasovatel_ico": null
            },
            "program": {
                "id": 10,
                "kod": "401000",
                "nazov": "Program Slovensko",
                "kod_cci": "2021SK16FFPR001"
            }
        }
    ]
}
```

### 10. Získanie výziev ITMS21+

**Endpoint** `/api/itms21_vyzvy`

**Metóda** `GET`

**Popis** Získa vyhlásené výzvy ITMS21+ vrátane dátumov, vyhlasovateľa, programu, špecifických cieľov a súm. Pole `id` je zdrojové ID výzvy.

**Query parametre**

- `id[]` (integer[], voliteľné) – Zdrojové ID výziev ITMS21+.
- `kod[]` (string[], voliteľné) – Kódy výziev.
- `nazov[]` (string[], voliteľné) – Slovenské názvy výziev.
- `typ[]` (string[], voliteľné) – Typy výziev.
- `stav[]` (string[], voliteľné) – Stavy výziev `zrusena`, `uzavreta`, `pozastavena` alebo `vyhlasena`.
- `datum_vyhlasenia_od` (date, voliteľné) – Dolná hranica dátumu vyhlásenia vrátane.
- `datum_vyhlasenia_do` (date, voliteľné) – Horná hranica dátumu vyhlásenia vrátane.
- `limit` (integer, voliteľné) – Maximálny počet výsledkov na vrátenie (predvolené 100, maximum 100).
- `offset` (integer, voliteľné) – Počet preskočených výsledkov (predvolené 0).

Stav výzvy zodpovedá prvému aktívnemu príznaku v poradí `zrusena`, `uzavreta`, `pozastavena`, `vyhlasena`. Bez aktívneho príznaku je stav `null`.

**Príklad požiadavky**

```http
GET /api/itms21_vyzvy?kod[]=PSK-PRIKLAD-01&stav[]=vyhlasena&limit=10
```

**Príklad odpovede**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "offset": 0,
        "limit": 10,
        "order_by": "zaznam_vytvoreny asc, id asc",
        "min_created_at": "2025-01-10T08:00:00.000Z",
        "max_created_at": "2025-01-10T08:00:00.000Z"
    },
    "data": [
        {
            "id": 42,
            "kod": "PSK-PRIKLAD-01",
            "nazov": "Energetická obnova verejných budov",
            "nazov_de": null,
            "nazov_en": null,
            "zaznam_vytvoreny": "2025-01-10T08:00:00.000Z",
            "zaznam_aktualizovany": "2025-01-13T12:00:00.000Z",
            "typ": "Dopytová",
            "druh": null,
            "stav": "vyhlasena",
            "vyhlasovatel": {
                "id": 51
            },
            "datum_vyhlasenia": "2025-01-10T09:00:00.000Z",
            "datum_ukoncenia": "2025-06-30T12:00:00.000Z",
            "suma_eu": 850000.0,
            "suma_sr": 150000.0,
            "program": {
                "id": 10,
                "kod": "401000"
            },
            "specificke_ciele": [
                {
                    "id": 13,
                    "kod": "RSO2.1"
                }
            ]
        }
    ]
}
```

### 11. Získanie programov ITMS21+

**Endpoint** `/api/itms21_programy`

**Metóda** `GET`

**Popis** Získa programy ITMS21+ vrátane kódu CCI, typu programu, riadiaceho orgánu, súm a dostupného opisu. Pole `id` je zdrojové ID programu.

**Query parametre**

- `id[]` (integer[], voliteľné) – Zdrojové ID programov ITMS21+.
- `kod[]` (string[], voliteľné) – Kódy programov.
- `nazov[]` (string[], voliteľné) – Slovenské názvy programov.
- `limit` (integer, voliteľné) – Maximálny počet výsledkov na vrátenie (predvolené 100, maximum 100).
- `offset` (integer, voliteľné) – Počet preskočených výsledkov (predvolené 0).

**Príklad požiadavky**

```http
GET /api/itms21_programy?kod[]=401000&limit=10
```

**Príklad odpovede**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "offset": 0,
        "limit": 10,
        "order_by": "zaznam_vytvoreny asc, id asc",
        "min_created_at": "2024-01-01T08:00:00.000Z",
        "max_created_at": "2024-01-01T08:00:00.000Z"
    },
    "data": [
        {
            "id": 10,
            "kod": "401000",
            "nazov": "Program Slovensko",
            "nazov_de": null,
            "nazov_en": "Slovakia Programme",
            "zaznam_vytvoreny": "2024-01-01T08:00:00.000Z",
            "zaznam_aktualizovany": "2025-02-10T12:00:00.000Z",
            "kod_cci": "2021SK16FFPR001",
            "skratka": "PSK",
            "typ_programu": {
                "kod": "P"
            },
            "suma_eu": 8500000.0,
            "suma_sr": 1500000.0,
            "suma_spolu": 10000000.0,
            "riadiaci_organ": {
                "id": 51,
                "nazov": "Orgán programu Príklad"
            },
            "popis": null
        }
    ]
}
```

### 12. Získanie priorít ITMS21+

**Endpoint** `/api/itms21_priority`

**Metóda** `GET`

**Popis** Získa priority ITMS21+ vrátane ich programu. Pole `id` je zdrojové ID priority.

**Query parametre**

- `id[]` (integer[], voliteľné) – Zdrojové ID priorít ITMS21+.
- `kod[]` (string[], voliteľné) – Kódy priorít.
- `nazov[]` (string[], voliteľné) – Slovenské názvy priorít.
- `program[]` (string[], voliteľné) – Kódy alebo slovenské názvy programov.
- `limit` (integer, voliteľné) – Maximálny počet výsledkov na vrátenie (predvolené 100, maximum 100).
- `offset` (integer, voliteľné) – Počet preskočených výsledkov (predvolené 0).

**Príklad požiadavky**

```http
GET /api/itms21_priority?program[]=401000&limit=10
```

**Príklad odpovede**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "offset": 0,
        "limit": 10,
        "order_by": "zaznam_vytvoreny asc, id asc",
        "min_created_at": "2024-01-01T08:00:00.000Z",
        "max_created_at": "2024-01-01T08:00:00.000Z"
    },
    "data": [
        {
            "id": 12,
            "kod": "P2",
            "nazov": "Zelenšia Európa",
            "nazov_de": null,
            "nazov_en": "A greener Europe",
            "zaznam_vytvoreny": "2024-01-01T08:00:00.000Z",
            "zaznam_aktualizovany": "2025-02-10T12:00:00.000Z",
            "program": {
                "id": 10,
                "kod": "401000",
                "nazov": "Program Slovensko"
            }
        }
    ]
}
```

### 13. Získanie dokumentov obstarávaní

**Endpoint** `/api/dokumenty_obstaravani`

**Metóda** `GET`

**Popis** Získa dokumenty vybraných zákaziek s načítanými metadátami, zdrojmi a aktuálnymi deduplikovanými prílohami. Dokumenty sú zoradené od najnovších podľa dátumu zverejnenia a pri rovnakom dátume od najvyššieho ID.

**Query parametre**

- `order_id[]` (integer[], voliteľné) – Identifikátory zákaziek ÚVO.
- `eks_id[]` (string[], voliteľné) – Identifikátory zákaziek EKS, napríklad `Z2026000123`.
- `limit` (integer, voliteľné) – Maximálny počet výsledkov na vrátenie (predvolené 100, maximum 100).
- `offset` (integer, voliteľné) – Počet preskočených výsledkov (predvolené 0).

Zadajte aspoň jeden identifikátor zákazky. Pri zadaní oboch filtrov sa vrátia dokumenty všetkých vybraných zákaziek. API vráti `422 Unprocessable Entity` pri chýbajúcom alebo neplatnom identifikátore.

V poli `prilohy` je pri každom súbore veľkosť v bajtoch a priamy odkaz na stiahnutie `subor_url`. Nepoužiteľná uložená URL sa vráti ako `null`. Príznak `vyhladavatelne` označuje prílohu v stave `processed` alebo `partial` s fulltextovým indexom. Dokument bez aktuálnych príloh má `prilohy: []`.

Na fulltext v jednom dokumente použite hodnotu `data[].id` v ceste `/api/dokumenty_obstaravani/:id/vyhladavanie`. Celú zákazku alebo zákazky obstarávateľa môžete prehľadať priamo cez `/api/dokumenty_obstaravani/vyhladavanie`.

**Príklad požiadavky**

```http
GET /api/dokumenty_obstaravani?order_id[]=567257&limit=20&offset=0
```

**Príklad odpovede**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "limit": 20,
        "offset": 0,
        "order_by": "datum_zverejnenia desc, id desc"
    },
    "data": [
        {
            "id": 12345,
            "order_id": 567257,
            "eks_id": null,
            "nazov": "Súťažné podklady k obnove budovy",
            "typ_dokumentu": "Súťažné podklady",
            "nazov_zakazky": "Obnova obecnej budovy",
            "obstaravatel_meno": "Mesto Príklad",
            "obstaravatel_externe_id": 61101,
            "zdroj": "uvo",
            "externe_id": "987654",
            "url": "https://www.uvo.gov.sk/vyhladavanie/vyhladavanie-dokumentov/detail/987654",
            "datum_zverejnenia": "2025-06-01T08:00:00.000Z",
            "datum_aktualizacie": "2025-06-03T10:00:00.000Z",
            "zdroje": [
                {
                    "zdroj": "uvo",
                    "externe_id": "987654",
                    "url": "https://www.uvo.gov.sk/vyhladavanie/vyhladavanie-dokumentov/detail/987654"
                }
            ],
            "prilohy": [
                {
                    "id": 12346,
                    "externe_id": "678901",
                    "nazov": "Technicka-specifikacia.pdf",
                    "zdroj": "uvo",
                    "mime_typ": "application/pdf",
                    "velkost_suboru": 248640,
                    "subor_url": "https://www.uvo.gov.sk/vyhladavanie/vyhladavanie-dokumentov/download/987654/678901",
                    "stav_ocr": "processed",
                    "vyhladavatelne": true
                }
            ]
        }
    ]
}
```

### 14. Vyhľadávanie v prílohách jedného dokumentu

**Endpoint** `/api/dokumenty_obstaravani/:id/vyhladavanie`

**Metóda** `GET`

**Popis** Vyhľadá výraz v indexovaných aktuálnych prílohách jedného dokumentu. Vracia metadáta zhodných príloh vrátane `subor_url`, zoradené podľa ID prílohy. Odpoveď je bez OCR textu a úryvkov.

**Parametre cesty**

- `id` (integer, povinné) – Interné ID dokumentu z `/api/dokumenty_obstaravani`.

**Query parametre**

- `query` (string, povinné) – Hľadaný výraz s dĺžkou najviac 300 znakov.
- `limit` (integer, voliteľné) – Maximálny počet výsledkov na vrátenie (predvolené 100, maximum 100).
- `offset` (integer, voliteľné) – Počet preskočených výsledkov (predvolené 0).

Pri nulovej zhode je `data: []`. API vráti `404 Not Found` pri neexistujúcom dokumente a `422 Unprocessable Entity` pri chýbajúcom alebo neplatnom výraze.

**Príklad požiadavky**

```http
GET /api/dokumenty_obstaravani/12345/vyhladavanie?query=izol%C3%A1cia&limit=20
```

**Príklad odpovede**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "limit": 20,
        "offset": 0,
        "order_by": "id asc",
        "dokument_id": 12345
    },
    "data": [
        {
            "id": 12346,
            "externe_id": "678901",
            "nazov": "Technicka-specifikacia.pdf",
            "zdroj": "uvo",
            "mime_typ": "application/pdf",
            "velkost_suboru": 248640,
            "subor_url": "https://www.uvo.gov.sk/vyhladavanie/vyhladavanie-dokumentov/download/987654/678901",
            "stav_ocr": "processed",
            "vyhladavatelne": true
        }
    ]
}
```

### 15. Vyhľadávanie v dokumentoch podľa zákazky alebo obstarávateľa

**Endpoint** `/api/dokumenty_obstaravani/vyhladavanie`

**Metóda** `GET`

**Popis** Vyhľadá výraz v indexovaných prílohách dokumentov zákazky alebo obstarávateľa. Vracia metadáta zhodných príloh vrátane `subor_url`, ID a názvu dokumentu a identifikátora zákazky. Odpoveď je bez OCR textu a úryvkov.

**Query parametre**

- `query` (string, povinné) – Hľadaný výraz s dĺžkou najviac 300 znakov.
- `order_id` (integer, voliteľné) – Identifikátor jednej zákazky ÚVO.
- `eks_id` (string, voliteľné) – Identifikátor jednej zákazky EKS, napríklad `Z20260001`.
- `obstaravatel_ico` (string, voliteľné) – IČO jedného obstarávateľa. Zohľadnia sa aj evidované varianty s chýbajúcimi úvodnými nulami.
- `obstaravatel_id` (integer, voliteľné) – Interné ID jedného obstarávateľa z `/api/obstaravatelia`.
- `limit` (integer, voliteľné) – Maximálny počet výsledkov na vrátenie (predvolené 100, maximum 100).
- `offset` (integer, voliteľné) – Počet preskočených výsledkov (predvolené 0).

Zadajte aspoň jeden filter spomedzi `order_id`, `eks_id`, `obstaravatel_ico` a `obstaravatel_id`. Pri kombinácii filtrov musí výsledok spĺňať všetky zadané podmienky. Pri vyhľadávaní podľa obstarávateľa API zistí jeho zákazky z oznámení, výsledkov a dokumentov priradených k jeho profilu ÚVO. Potom prehľadá všetky dokumenty týchto zákaziek podľa `order_id` alebo `eks_id` bez ohľadu na zdroj dokumentu.

Pri nulovej zhode je `data: []`. API vráti `422 Unprocessable Entity` pri chýbajúcom alebo neplatnom filtri rozsahu či výraze.

**Príklady požiadaviek**

```http
GET /api/dokumenty_obstaravani/vyhladavanie?order_id=567257&query=izol%C3%A1cia&limit=20
GET /api/dokumenty_obstaravani/vyhladavanie?eks_id=Z20260001&query=izol%C3%A1cia&limit=20
GET /api/dokumenty_obstaravani/vyhladavanie?obstaravatel_ico=00123456&query=izol%C3%A1cia&limit=20
GET /api/dokumenty_obstaravani/vyhladavanie?obstaravatel_id=13&query=izol%C3%A1cia&limit=20
```

**Príklad odpovede**

```json
{
    "summary": {
        "total_records": 1,
        "requested_records": 1,
        "limit": 20,
        "offset": 0,
        "order_by": "id asc"
    },
    "data": [
        {
            "id": 12346,
            "externe_id": "678901",
            "nazov": "Technicka-specifikacia.pdf",
            "zdroj": "uvo",
            "mime_typ": "application/pdf",
            "velkost_suboru": 248640,
            "subor_url": "https://www.uvo.gov.sk/vyhladavanie/vyhladavanie-dokumentov/download/987654/678901",
            "stav_ocr": "processed",
            "vyhladavatelne": true,
            "dokument_id": 12345,
            "dokument_nazov": "Súťažné podklady k obnove budovy",
            "order_id": 567257,
            "eks_id": null
        }
    ]
}
```

### Poznámky

- Vyhlásené aj ukončené obstarávania vracajú IČO v `obstaravatel_ico`. Pôvodný kľúč `obstravatel_ico` je alias s rovnakou hodnotou.
- `limit` a `offset` sú nezáporné celé čísla. Limit má strop 100 a `summary.limit` je vždy číslo. V `/api/ruz_zavierky` určuje počet rokov a pri vynechaní alebo hodnote `0` sa použije jeden rok.
- Dátumy zadávajte vo formáte `YYYY-MM-DD`. Podporovaný je aj zápis `DD.MM.YYYY`. Z časovej pečiatky ISO 8601 sa použije jej dátumová časť. Hranice rozsahu zahŕňajú celý kalendárny deň v zóne `Europe/Bratislava`.
- Časové pečiatky vo výstupe sú v ISO 8601 v UTC (`Z`), aj keď ich zdroj ITMS21+ poskytol ako milisekundy od epochy. Zdrojové časové pečiatky bez posunu sa interpretujú ako UTC. Dátumy bez času sú vo formáte `YYYY-MM-DD`. Pri monitorovacích termínoch ITMS sa používa kalendárny deň v zóne `Europe/Bratislava`. Polia `startdate` a `enddate` v častiach zákazky majú pri chýbajúcom alebo nečitateľnom dátume hodnotu `null`.
- Peňažné sumy vrátane `rozdelenie_na_casti_list[].order_value`, `rozsah_od` a `rozsah_do` sa vracajú ako desatinné JSON čísla. Neznáme alebo nečitateľné sumy sa vracajú ako `null`. Na výpočty s presnou desatinnou hodnotou použite desatinný typ klienta.
- Číselné hodnoty ukazovateľov ITMS vrátane `hodnota_cielova_celkova` sa vracajú ako JSON čísla.
- V `/api/subjekty` a `/api/ruz_zavierky` sa pri chýbajúcom alebo neplatnom IČO vracia `422` s hláškou podľa typu chyby.
- Neznámy endpoint, neplatný dátum, neplatné stránkovanie alebo nesprávny tvar zoznamového filtra vrátia `404` s poľom `error` v JSON.
- API vracia dáta vo formáte JSON s kódovaním UTF-8.

Zoznamové filtre zapisujte s hranatými zátvorkami `[]`. Hodnoty zadajte opakovaním parametra alebo ich oddeľte čiarkou v jednej hodnote.

```http
GET /api/vyhlasene_obstaravania?obstaravatel_id[]=86958&obstaravatel_id[]=86959
GET /api/vyhlasene_obstaravania?obstaravatel_id[]=86958,86959
```
