# 🏋️‍♂️ GymTrackerApp
Jednostavna PHP/MySQL aplikacija za praćenje osobnih treninga u teretani.

## 🗂️ Sadržaj (fileovi):
- 🗄️ `db/install.sql`  
  SQL skripta za kreiranje baze podataka, tablica i osnovnog korisnika (`test@example.com` / `test123`)
  > ⚠️ **Pazi:**
  > Moraš to pokrenuti u PhpMyAdmin-u kako bi napravio novu db i novu tablicu
- 🔌 `db.php`  
  PHP za povezivanje na MySQL bazu podataka.
- 🎨 `css/style.css`  
  Neki CSS stilovi za aplikaciju (tnx, Copilot! <3)
- 🔑 `index.php`  
  Ulazna stranica (login forma). Omogućuje prijavu korisnika.
- ▶️ `login.php`  
  PHP skripta koja obrađuje podatke s login forme i prijavljuje korisnika.
- 🚪 `logout.php`  
  Odjavljuje korisnika i uništava sesiju.
- 🏠 `dashboard.php`  
  Glavna stranica nakon prijave. Prikazuje popis svih treninga prijavljenog korisnika i omogućuje pristup dodavanju, uređivanju i brisanju treninga.
- ➕ `add_workout.php`  
  Forma za unos novog treninga.
- ✏️ `edit_workout.php`  
  Forma za uređivanje postojećeg treninga (dostupno samo za treninge prijavljenog korisnika).
- 🗑️ `delete_workout.php`  
  Skripta za brisanje treninga (dostupno samo za treninge prijavljenog korisnika).

---

## 📝 Šta ću / kako ću?
1. 📊 Importaj bazu:
    - U phpMyAdminu ili MySQL klijentu okini skriptu za *instalaciju* baze: `db/install.sql`
2. 💻 Postavi app na lokalni server (kopiraj u XAMPP)
3. 🛠️ Po potrebi, updateuj `db.php` za spajanje (korisničko ime, lozinka)
4. 🌍 Otvori bilo koji browser koji nije Appleov Safari i učitaj app (na localhost-u)
5. 🔐 Prijavi se:
   - Email: `test@example.com`
   - Lozinka: `test123`
   > 🚨 **Važno!** 
   > Ovi login credentialsi vrijede **samo ako si kreirao bazu i tablice uz moj db/install.sql**
6. 🏋️‍♂️ Isprobaj app:
   - Dodaj nove workoute, uredi ili obriši postojeće i pregledaj svašta-nešta

> 💡 **Napomena:**
> Nisam stavio registraciju jer mislim a ne treba. To znači da ako hoćeš novog usera dodati, moraš preko baze, ali možemo i to dodati.

---

## 🤝 Autori
- OG: D. K.
- Updateovao / refaktorirao: RubberDuck01
- Special thanks: Copilot 🤖

---

Ako zapneš, pingaj RubberDuck01! 😉