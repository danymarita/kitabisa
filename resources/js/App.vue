<template>
<div class="row">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-sm fixed-top navbar-main-top navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img :src="'/images/logogram__ktbs_white.png'" alt="Kitabisa.com">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to="/home" class="nav-link">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/sum" class="nav-link">Sum</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/multiply" class="nav-link">Multiply</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/prime-number" class="nav-link">Prime Number</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/fibonacci" class="nav-link">Fibonacci</router-link>
                </li>
            </ul>
        </div>
    </nav>
    <div  role="main" class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card tab-card">
                    <img :src="'/images/banner.jpg'" alt="banner" style="height: 300px;">
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>
</div>
</template>

<style>
    body {
        padding: 4.5rem 0 2rem 0;
        min-height: 45rem;
    }
</style>

<script>
    export default{
        watch: {
            '$route' (to, from) {
                document.title = 'Kitabisa! - ' + to.meta.title || 'Kitabisa!'
            }
        }
    }
</script>