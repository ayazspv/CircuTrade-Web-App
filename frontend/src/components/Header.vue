<template>
    <header class="bg-white text-menu py-3">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand logo-text" href="#">CircuTrade</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-4">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="#">Materialen Kopen</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="#">Materialen Verkopen</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="#">Over Ons</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Inloggen</a></li>
                            <li><a class="dropdown-item" href="#">Aanmelden</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style scoped>
.nav-link {
    color: #284C2A;
}

.logo-text {
    color: #284C2A;
    font-family: arial black;
    font-size: 24px;
}
</style>