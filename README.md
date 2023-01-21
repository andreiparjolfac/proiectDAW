# proiectDAW
<b>Magazin online</b> <br>
Proiectul utilizeaza o baza de date MySQL si este programat in PHP <br>
Exista cate o pagina pentru autentificarea si inregistrarea utilizatorilor.<br>
Exista 3 tipuri de utilizatori : neinregistrat , inregistrat si administrator. <br>
Utilizatorul neinregistrat poate sa caute produse si sa le adauge in cosul virtual insa nu poate completa procesul de checkut fara sa fie inregistrat.<br>
Utilizatorul inregistrat poate sa completeze procesul de checkout si are o pagina in care poate sa-si editeze profilul si sa vada istoricul tranzatiilor sale.<br>
Administratorul poate sa creeze ,editeze si sa stearga produsele din magazin , poate sa vada tranzactiile efectuate si poate sa blocheze accesul utilizatorilor inregistrati.<br>
Exista un formular de contact pentru plangeri/sugestii ce foloseste smtp gmail , cu protectie impotriva spam-ului folosind Google reCaptcha. <br>
Aplicatia contine mai multe pagini dinamice cu legaturi intre ele . De exemplu un administrator poate sa creeze un produs nou iar restul utilizatorilor il pot vedea imediat.<br>
La fiecare login respectiv logout se initializeaza respectiv se termina o sesiune iar paginile pe care utilizatorul le vizualizeaza se schimba conform sesiunii.De asemenea sunt anumite pagini pe care utlizatorul nu le poate vedea decat daca este inregistrat. <br>

<b>Baza de date folosita</b> <br>

Descrierea entităților, incluzând precizarea cheii primare. <br>
<table>
  <thead>
    <th>Entitate</th>
    <th>Cheie Primara</th>
    <th>Descriere</th>
  </thead>
  <tbody>
    <tr>
      <td>brands</td>
      <td>brand_id</td>
      <td>Diverse branduri ale furnizorilor</td>
    </tr>
    <tr>
      <td>categories</td>
      <td>category_id</td>
      <td>Categoriile din care fac parte produsele vandute</td>
    </tr>
    <tr>
      <td>Products</td>
      <td>product_id</td>
      <td>Produsele propuse spre vanzare</td>
    </tr>
    <tr>
      <td>brands</td>
      <td>brand_id</td>
      <td>Diverse branduri ale furnizorilor</td>
    </tr>
    <tr>
      <td>admin_table</td>
      <td>admin_id</td>
      <td>Contine date despre administratori</td>
    </tr>
    <tr>
      <td>user_table</td>
      <td>user_id</td>
      <td>Contine date despre utilizatorii inregistrati</td>
    </tr>
    <tr>
      <td>cart_details</td>
      <td>Compusa(product_id & ip & user_id)</td>
      <td>Contine date despre cosul virtual (ce si cate produse?)</td>
    </tr>
    <tr>
      <td>user_orders</td>
      <td>order_id</td>
      <td>Contine date despre comenzile utilizatorilor</td>
    </tr>
    <tr>
      <td>user_payments</td>
      <td>payment_id</td>
      <td>Contine date despre platile inregistrate pentru comenzi</td>
    </tr>
  </tbody>
</table>
