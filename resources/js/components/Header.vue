<template>
    <header>
    <div class="container">
        <nav class="menu">
            <ul> 
                <li><router-link :to="{name: 'home'}">BoolPress</router-link></li>
                <li><router-link :to="{name: 'home'}">Home</router-link></li>
                <li><router-link :to="{name: 'about'}">About</router-link></li>
                <li><router-link :to="{name: 'blog'}">Blog</router-link></li>
            </ul>
        </nav>
    </div>
</header>
  
</template>

<script>


export default {
    name: 'Header'

}
</script>

<style lang="scss" scoped>

header{
    display: flex;
    background-color: black;
    margin-bottom: 20px;

    .container {
        display: flex;
        justify-content: space-between;
        line-height: 120px;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 16px;

        /*Link Header*/
        .menu ul {
            display: flex;
            justify-content: center;
        
            li {
                margin-left: 20px;
                text-transform: uppercase;
        
                a {
                    color: grey;
                }
                a:hover {
                    color: rgb(194, 191, 191);
                }
            }
        }

    }

}

.active {
    border-bottom: 2px solid #fff;
}




</style>