
# Dokumentácia API

## Prehľad
Táto dokumentácia poskytuje prehľad o API endpointoch pre portál UVOstat.sk. Obsahuje podrobnosti o tom, ako používať API, ako volať endpointy, dostupné filtračné parametre, očakávaný výstupný formát a URL adresy na volanie.

## Autentifikácia
Všetky API požiadavky vyžadujú hlavičku `ApiToken` pre autentifikáciu. Bez platného tokenu API vráti odpoveď `401 Unauthorized`.

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
            "obstravatel_ico": "53560922",
            "znacka": "DPMM/VO/1/2021",
            "datum_zverejnenia": "2021-03-09T00:00:00.000Z",
            "formular": "OZNÁMENIE O VYHLÁSENÍ VEREJNÉHO OBSTARÁVANIA",
            "typ": "Tovary",
            "phz": "9520000.0",
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
                    "enddate": "",
                    "quality": "Nie",
                    "costprice": "Cena",
                    "startdate": "",
                    "finalplace": "Dopravný podnik mesta Martin, s. r. o., Námestie S. H. Vajanského 1/1, 036 01 Martin - katastrálne územie mesta",
                    "timelength": "v mesiacoch (od zadania zákazky) : 7",
                    "order_value": "9 520 000,00",
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
            "obstravatel_ico": "53560922",
            "znacka": "01_23",
            "datum_zverejnenia": "2023-04-18T00:00:00.000Z",
            "formular": "OZNÁMENIE O VYHLÁSENÍ VEREJNÉHO OBSTARÁVANIA – VYBRANÉ ODVETVIA",
            "typ": "Tovary",
            "phz": "1765717.5",
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
                    "enddate": "",
                    "quality": "Nie",
                    "costprice": "Cena",
                    "startdate": "",
                    "finalplace": "Dopravný podnik mesta Martin, s.r.o., Flámska 1, 036 01 Martin",
                    "timelength": "24",
                    "order_value": "1 765 717,50",
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
            "obstravatel_ico": "53560922",
            "znacka": "02_23",
            "datum_zverejnenia": "2023-10-03T00:00:00.000Z",
            "formular": "OZNÁMENIE O VYHLÁSENÍ VEREJNÉHO OBSTARÁVANIA – VYBRANÉ ODVETVIA",
            "typ": "Tovary",
            "phz": "3958300.0",
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
                    "enddate": "",
                    "quality": "Nie",
                    "costprice": "Cena",
                    "startdate": "",
                    "finalplace": "Dopravný podnik mesta Martin, s.r.o., Flámska 1, 036 01 Martin",
                    "timelength": "24",
                    "order_value": "3 958 300,00",
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

**Popis:** Získa záznamy o CRZ zmluvách.

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
        "order_by": "zaznam_vytvoreny asc",
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
            "suma_zmluvy": "0",
            "suma_celkovo": "0",
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
            "suma_zmluvy": "0",
            "suma_celkovo": "0",
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

### Poznámky

- Parameter `limit` pre všetky endpointy je obmedzený na 100 záznamov na jednu požiadavku, aby sa predišlo výkonnostným problémom. Ak je potrebných viac záznamov, použite parameter `offset` na stránkovanie výsledkov.
- Dátumy by mali byť poskytnuté vo formáte `YYYY-MM-DD`.
- API vracia dáta vo formáte JSON s kódovaním UTF-8.

#### Dôležité:
Ak je možné, že v dotaze bude viac ako jeden záznam (napríklad pre parameter `obstaravatel_id`), parameter musí byť volaný s použitím hranatých zátvoriek `[]`.

Príklad správnej požiadavky:

```http
GET /api/vyhlasene_obstaravania?cpv[]=34121100-2&obstaravatel_id[]=86958
```
