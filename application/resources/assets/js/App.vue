<template>
    <div>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <router-link :exact=true :to="{ name: 'DisplayItem' }" class="navbar-brand" href="/"><i class="fa fa-database"></i> Tradebyte PIM</router-link>
            </div>
            <ul class="nav navbar-nav">
                <router-link tag="li" :exact=true :to="{ name: 'DisplayItem' }" active-class="active">
                    <a href="/">Articles</a>
                </router-link>
                <router-link tag="li" :to="{ name: 'DisplayCategory' }" active-class="active">
                    <a href="/categories">Categories</a>
                </router-link>
            </ul>
        </div>
        </nav>
        <div class="container">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>

    export default{
    }
</script>
