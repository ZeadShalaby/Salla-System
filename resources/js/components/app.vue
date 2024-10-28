<template>
    <div class="container">
        <!---- Navigation Component --->
            <nav-component></nav-component>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>

                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        <router-view/>
    </main>
<footer class="footer">
  <footer-component></footer-component>  
</footer>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
