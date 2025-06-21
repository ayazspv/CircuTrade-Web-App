<template>
    <div class="home">
        <Header />

        <div class="banner d-flex flex-column justify-content-center align-items-center text-center bg-transparent text-white">
            <div class="banner-text">
                <h1 class="display-4 fw-bold h1 header-text">
                    <span class="first-half">Circu</span><span class="second-half">Trade</span>
                </h1>
                <p class="lead-banner">
                    <span class="first-half span-distance-left">Duurzaam handelen</span>
                    <span class="second-half span-distance-right">Slim hergebruiken</span>
                </p>
            </div>
            <div class="search-bar mt-4 w-75">
                <form class="d-flex">
                    <input class="form-control form-control-lg me-2" type="search" placeholder="Zoek voor materialen..."
                        aria-label="Search" />
                    <select class="form-select form-select-lg me-2" aria-label="Filter by location">
                        <option selected>Locatie</option>
                        <option value="1">Leiden</option>
                        <option value="2">Amsterdam</option>
                        <option value="3">Rotterdam</option>
                        <option value="4">Utrecht</option>
                    </select>
                    <button class="btn btn-search btn-lg" type="submit">Opzoeken</button>
                </form>
            </div>
        </div>
    </div>


        <div class="container bg-white my-5 icon-grid">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="icon-box text-center p-4 border rounded">
                        <i class="fas fa-tools fa-3x mb-3 text-primary"></i>
                        <h3>Onderhoud</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box text-center p-4 border rounded">
                        <i class="fas fa-building fa-3x mb-3 text-success"></i>
                        <h3>Bouw</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box text-center p-4 border rounded">
                        <i class="fas fa-lightbulb fa-3x mb-3 text-warning"></i>
                        <h3>Innovatie</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optimized Onze Missie Section -->
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="fw-bold house-font">Onze Missie</h2>
                    <p class="lead text-justify">
                        Bij CircuTrade wordt gestreefd naar een duurzamere en efficiëntere onderhouds- en bouwsector
                        door herbruikbare materialen, zowel restmaterialen als nieuwe materialen, een tweede leven te
                        geven. Via een innovatief digitaal platform worden aanbieders van deze materialen verbonden met
                        onderhouds- en bouwprofessionals, terwijl data-gestuurde inzichten over circulariteit,
                        hergebruik en materiaaltransformatie worden geboden.
                    </p>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <img src="../../images/img2.jpeg" alt="Onze Missie" class="img-fluid rounded" />
                </div>
            </div>
        </div>

        <Footer />
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

export default {
    name: 'Home',
    components: {
        Header,
        Footer,
    },
};
</script>

<style scoped>
.home {
    background: linear-gradient(to right, #848048, 50%, #284C2A 50%);
}

.banner {
    width: 100%;
    height: 600px;
    /* Adjust height as needed */
    /* background: linear-gradient(to right, #848048, 50%, #284C2A 50%); */
}

.search-bar {
    max-width: 800px;
    /* Optional: Limit the width of the search bar */
}

.icon-box {
    background-color: #f8f9fa;
    /* Light background for the boxes */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.icon-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.first-half {
    color: #284C2A;
}

.second-half {
    color: #848048;
}

.header-text {
    font-size: 6rem;
    font-family: Arial Black;
    margin-bottom: -10px;
}

.lead-banner {
    margin-top: 0;
    font-family: Arial Black;
}

.span-distance-left {
    margin-right: 20px;
}

.span-distance-right {
    margin-left: 20px;
}

.btn-search {
    background-color: #848048;
    color: white;
}

.house-font {
    font-family: Arial Black;
    color: #284C2A;
}
</style>
