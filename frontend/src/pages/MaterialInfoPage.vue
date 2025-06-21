<template>
    <div class="body">
        <Header class="header" />
        <div class="container mt-5">
            <h1 class="text-center mb-4"><strong>Materiaal Info</strong></h1>

            <!-- Material Info Section -->
            <div class="row material-info">
                <div class="col-md-6 text-center">
                    <img src="../../../images/biobased-color.jpg" alt="Material Image"
                        class="img-fluid rounded border p-2" />
                </div>
                <div class="col-md-6">
                    <h2 class="material-name mb-3">Biobased Lak Gloss - Exterior</h2>
                    <p class="material-description text-muted mb-3">Deze milieuvriendelijke lak op basis van
                        hernieuwbare grondstoffen is geschikt voor houten buitenkozijnen. De witte verf (RAL 9010) wordt
                        geleverd in 5 blikken van 2,5L en biedt een sterke, glanzende afwerking met langdurige
                        bescherming tegen weersinvloeden.</p>
                    <p class="material-price mb-2"><strong>Price (Per Blik):</strong> €45</p>
                    <p class="material-quantity mb-2"><strong>Aantal:</strong> 5 (2.5L Per Blik)</p>
                    <p class="material-seller mb-2"><strong>Verkoper:</strong> XXX Schilderbedrijf</p>
                    <p class="mb-4"><strong>Datum:</strong> 14 Maart 2025</p>
                    <button class="btn btn-success btn-lg">Shoppen</button>
                </div>
            </div>

            <!-- Details Section -->
            <div class="details mt-5">
                <h2 class="text-center mb-4"><strong>Productanalyse & Details</strong></h2>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Type product:</strong> Biobased lak voor buitenkozijnen</li>
                    <li class="list-group-item"><strong>Hoeveelheid:</strong> 5 blikken</li>
                    <li class="list-group-item"><strong>Locatie aanbieder:</strong> Haarlem</li>
                </ul>
                <h3 class="mt-4"><strong>♻ Circulaire Waarde & Duurzaamheid</strong></h3>
                <ul class="list-group">
                    <li class="list-group-item">✅ <strong>Biobased & Duurzaam:</strong> Deze lak is grotendeels gemaakt
                        van natuurlijke en hernieuwbare grondstoffen in plaats van fossiele grondstoffen. Dit verlaagt
                        de CO₂-voetafdruk en vermindert de afhankelijkheid van chemische oplosmiddelen.</li>
                    <li class="list-group-item">✅ <strong>Lange levensduur:</strong> De lak biedt een sterke, glanzende
                        afwerking en beschermt houten kozijnen langdurig tegen weersinvloeden. Dit betekent minder
                        onderhoud en minder grondstoffenverbruik op de lange termijn.</li>
                    <li class="list-group-item">✅ <strong>Restmateriaal Hergebruik:</strong> Indien er lak overblijft na
                        het schilderen, kan dit worden hergebruikt voor toekomstige onderhoudswerkzaamheden of worden
                        aangeboden via CircuTrade aan andere onderhoudsbedrijven.</li>
                    <li class="list-group-item">✅ <strong>Milieuvoordelen:</strong> De lak bevat minder vluchtige
                        organische stoffen (VOS) dan conventionele verven, wat beter is voor de luchtkwaliteit en de
                        gezondheid van schilders en bewoners.</li>
                </ul>
                <h3 class="mt-4"><strong>📍 Dichtbijheidsanalyse & Logistiek</strong></h3>
                <ul class="list-group">
                    <li class="list-group-item">🚛 <strong>Afstand tussen aanbieder en koper:</strong> ~40 km (Haarlem ➝
                        Leiden)</li>
                    <li class="list-group-item">🔋 <strong>CO₂-impact transport:</strong> Lager dan bij nieuwe levering
                        via groothandel, omdat het product zich al binnen de regio bevindt. Dit bespaart op productie en
                        transportemissies.</li>
                    <li class="list-group-item">🌱 <strong>Optimaal Transportadvies:</strong>
                        <ul>
                            <li>Direct ophalen door de onderhoudsmanager of een medewerker. Dit bespaart
                                verpakkingsmateriaal en extra logistieke uitstoot.</li>
                            <li>Duurzame bezorging via een koeriersdienst met elektrische voertuigen.</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Centered Image -->
            <div class="text-center my-5">
                <h3 class="mt-4"><strong>DCBA Tool - Circulariteitstest</strong></h3>
                <img src="../../../images/dcba.jpg" alt="Material Image" class="img-fluid rounded border p-2" />
            </div>

            <!-- Shop Now Button -->
            <div class="text-center mb-5">
                <button class="btn btn-success btn-lg px-5 py-3">Nu Kopen</button>
            </div>
        </div>

        <Footer class="footer mt-5" />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

export default {
    name: 'Info',
    components: {
        Header,
        Footer,
    },
};
</script>

<style scoped>
.header {
    border-bottom: 2px solid #c5c5c5;
    margin-bottom: 50px;
}
.footer {
    margin-top: 50px;
}
.details ul {
    padding-left: 0;
}
.details ul li {
    list-style: none;
}
</style>