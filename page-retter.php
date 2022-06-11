<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

    <!-- <aside id="popup">
      <article>
        <a href="#" id="lukKnap"></a>
        <img src="" alt="" />
        <div id="popupIndhold">
          <h3 id="popupTitle" class="navn"></h3>
          <p class="langbeskrivelse"></p>
          <h4 class="pris"></h4>
          <button>Tilføj</button>
        </div>
      </article>
    </aside> -->

    <main>
        <!--H1 har et ID, da den skal styles anderledes end de andre H1'ere på sitet-->
        <h1 id="retter-overskrift">Menu</h1>
      <div id="retter-grid">
        <nav id="knapper">
          <button><a href="#pizzaslices">Pizza slices</a></button>
          <button><a href="#sandwiches">Sandwiches</a></button>
          <button><a href="#foccacia">Foccacia</a></button>
          <button><a href="#drikkevarer">Drikkevarer</a></button>
        </nav>
        <div>
        <section>
          <h2>Pizza slices</h2>
          <p>Køb vores varemærke – Romerske Pizza Slices. Disse er baseret på en lækker, sprød surdejsbund og toppet med håndplukkede råvarer i sæson.
</p>
          <div id="pizzaslices"></div>
        </section>
        <section>
          <h2>Sandwiches</h2>
          <p>Alle vores sandwiches er omsluttet af et filone brød, bagt på surdej og fyldt med håndplukkede råvarer i sæson.</p>
          <div id="sandwiches"></div>

        </section>
        <section>
          <h2>Foccacia</h2>
          <p>Store surdejs-foccacia. Disse er gode at bringe til middagsbordet derhjemme!</p>
          <div id="foccacia"></div>

        </section>
        <section>
          <h2>Drikkevarer</h2>
          <p>Vælg mellem vores forfriskende Italienske eller klassiske drikke.

</p>
          <div id="drikkevarer"></div>
        </section>
        </div>
      </div>
    </main>

    <!--Dette er skabelonen til vores delikatesser-->
    <template>
      <article class="artikel">
        <img src="" alt="" />
        <div id="indhold">
          <h3 id="navn">Navn</h3>
          <p id="fyld"></p>
          <p id="anbefaling"></p>
          <div class="pristilfoej">
            <h4 class="pris"></h4>
            <button id="tilfoej-hover">Bestil</button>
          </div>
        </div>
      </article>
    </template>

    <script>
      // Her opretter vi variabler
      let retter = [];
      let filter = "alle";
      let inddelinger = [];

      // Her opretter vi konstanter
      const pizzaslices = document.querySelector("#pizzaslices");
      const sandwiches = document.querySelector("#sandwiches");
      const foccacia = document.querySelector("#foccacia");
      const drikkevarer = document.querySelector("#drikkevarer");
      const template = document.querySelector("template").content;
      const knapListe = document.querySelector("#knapper");
      const popup = document.querySelector("#popup");

      const url =
        "https://mariksen.dk/kea/2-semester/eksamen_ny/wp-json/wp/v2/retter?per_page=100";
      const inddUrl =
        "https://mariksen.dk/kea/2-semester/eksamen_ny/wp-json/wp/v2/inddelinger";

      document.addEventListener("DOMContentLoaded", start);

      function start() {
        console.log("nu er vi i start");
        hentData();
      }

      // I den asynkrone funktion HENTES(fetch) vores data fra databasen
      async function hentData() {
        let response = await fetch(url);
        let inddResponse = await fetch(inddUrl);

        retter = await response.json();
        inddelinger = await inddResponse.json();

        visRetter();
      }

      // Delikatesserne loopes frem i denne funktion
      function visRetter() {
        console.log(retter);
        pizzaslices.innerHTML = "";
        // For hver delikatesse defineret i database, skal disse klones og vises
        retter.forEach((ret) => {
          console.log("hey");
          if (ret.inddelinger.includes(parseInt((inddelinger.id = "30")))) {
            let klon = template.cloneNode(true);
            klon.querySelector("#navn").textContent = ret.title.rendered;
            klon.querySelector("#fyld").textContent = ret.fyld;
            klon.querySelector("#anbefaling").textContent = "Vi anbefaler " + ret.anbefaling;
            klon.querySelector(".pris").textContent = ret.pris + " kr.";
            klon.querySelector("img").src = ret.billede.guid;
            pizzaslices.appendChild(klon);
          }
          if (ret.inddelinger.includes(parseInt((inddelinger.id = "33")))) {
            let klon = template.cloneNode(true);
            klon.querySelector("#navn").textContent = ret.title.rendered;
            klon.querySelector("#fyld").textContent = ret.fyld;
            klon.querySelector("#anbefaling").textContent = ret.anbefaling;
            klon.querySelector(".pris").textContent = ret.pris + " kr.";
            klon.querySelector("img").src = ret.billede.guid;
            drikkevarer.appendChild(klon);
          }
          if (ret.inddelinger.includes(parseInt((inddelinger.id = "32")))) {
            let klon = template.cloneNode(true);
            klon.querySelector("#navn").textContent = ret.title.rendered;
            klon.querySelector("#fyld").textContent = ret.fyld;
            klon.querySelector("#anbefaling").textContent = ret.anbefaling;
            klon.querySelector(".pris").textContent = ret.pris + " kr.";
            klon.querySelector("img").src = ret.billede.guid;
            foccacia.appendChild(klon);
          }
          if (ret.inddelinger.includes(parseInt((inddelinger.id = "34")))) {
            let klon = template.cloneNode(true);
            klon.querySelector("#navn").textContent = ret.title.rendered;
            klon.querySelector("#fyld").textContent = ret.fyld;
            klon.querySelector("#anbefaling").textContent = ret.anbefaling;
            klon.querySelector(".pris").textContent = ret.pris + " kr.";
            klon.querySelector("img").src = ret.billede.guid;
            // klon
            //   .querySelector("article")
            //   .addEventListener("click", () => visDetaljer(ret));
            sandwiches.appendChild(klon);
          }
        });
      }
    </script>
 

<?php
get_footer();
