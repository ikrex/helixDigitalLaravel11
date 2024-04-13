## PHP próbafeladat

Ez a projekt egy városokat kezelő CRUD (Create, Read, Update, Delete) felülettel rendelkezik. Az alkalmazás lehetővé teszi városok adatainak tárolását, szerkesztését és törlését. A városokról tárolt adatok a név, hosszúsági és szélességi fok.

### Funkcionalitások

- Városok listázása
- Város hozzáadása
- Város szerkesztése
- Város törlése

Az alkalmazás az Open Weather API-t használja az aktuális időjárási adatok lekérdezésére. Az óránkénti automatikus mentés során tárolt adatok:
- Aktuális hőmérséklet (Celsius fokban)
- Páratartalom (%)
- Szélsebesség (km/h)

### Használt technológiák

- Backend: PHP 8.3
- Frontend: HTML, CSS, JavaScript (Minimalista megjelenítés, hangsúly a funkcionalitáson)
- Backend keretrendszer: Laravel 11 (Ajánlott, de más megoldás is elfogadható)

