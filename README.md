# proiectDAW
<b>Magazin online</b> <br>
Proiectul utilizeaza o baza de date MySQL si este programat in PHP <br>
Exista 3 tipuri de utilizatori : neinregistrat , inregistrat si administrator. <br>
Utilizatorul neinregistrat poate sa caute produse si sa le adauge in cosul virtual insa nu poate completa procesul de checkut fara sa fie inregistrat.<br>
Utilizatorul inregistrat poate sa completeze procesul de checkout si are o pagina in care poate sa-si editeze profilul si sa vada istoricul tranzatiilor sale.<br>
Administratorul poate sa creeze ,editeze si sa stearga produsele din magazin , poate sa vada tranzactiile efectuate si poate sa blocheze accesul utilizatorilor inregistrati.<br>
Aplicatia contine mai multe pagini dinamice cu legaturi intre ele . De exemplu un administrator poate sa creeze un produs nou iar restul utilizatorilor il pot vedea imediat.<br>

La fiecare login respectiv logout se initializeaza respectiv se termina o sesiune iar paginile pe care utilizatorul le vizualizeaza se schimba conform sesiunii.De asemenea sunt anumite pagini pe care utlizatorul nu le poate vedea decat daca este inregistrat. <br>
