<template>
    <div class="body">
        <Header class="header" />

        <div class="container main-body mt-5">
            <div class="row">
                <!-- Left Side -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Kies Datum</h5>
                            <input type="date" class="form-control" />
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Afstand Filter</h5>
                            <input type="range" class="form-range" min="0" max="100" step="10" />
                            <p class="text-muted mt-2">Max Afstand: <span id="distance-value">50 km</span></p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Filter door Materiaal</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="biobasedFilter" />
                                <label class="form-check-label" for="biobasedFilter">
                                    Biobased
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="biobasedFilter" />
                                <label class="form-check-label" for="biobasedFilter">
                                    Recyclebaar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="biobasedFilter" />
                                <label class="form-check-label" for="biobasedFilter">
                                    CO2-reductie
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="biobasedFilter" />
                                <label class="form-check-label" for="biobasedFilter">
                                    Hernieuwbare Grondstoffen
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="biobasedFilter" />
                                <label class="form-check-label" for="biobasedFilter">
                                    Circulair
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="col-md-8">
                    <div class="row">
                        <!-- Material Item -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img src="../../../images/biobased-color.jpg" class="card-img-top"
                                    alt="Material Image" />
                                <div class="card-body">
                                    <h5 class="card-title">Biobased Lak Gloss</h5>
                                    <p>Deze milieuvriendelijke lak op basis van
                                        hernieuwbare...</p>
                                    <p><strong>Door:</strong> XXX Schilderbedrijf</p>
                                    <p>14 Maart 2025</p>
                                    <p class="card-text"><strong>Prijs:</strong> €45</p>
                                    <button class="btn btn-primary btn-sm">Details Bekijken</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Footer class="footer" />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

export default {
    name: 'MaterialList',
    components: {
        Header,
        Footer,
    },
};
</script>

<style scoped>
.main-body {
    margin-top: 20px;
}

.card {
    border-radius: 8px;
    overflow: hidden;
}

.card-img-top {
    height: 150px;
    object-fit: cover;
}

.header {
    border-bottom: 2px solid #c5c5c5;
    margin-bottom: 50px;
}

.footer {
    margin-top: 50px;
}
</style>