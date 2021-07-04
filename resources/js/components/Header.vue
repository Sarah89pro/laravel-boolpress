<template>
    <header>
    <div class="container">
        <nav class="menu">
            <ul> 
                <li><router-link :to="{name: 'home'}">Home</router-link></li>
                <li><router-link :to="{name: 'about'}">About</router-link></li>
                <li><router-link :to="{name: 'blog'}">Blog</router-link></li>
                <li><router-link :to="{name: 'contact'}">Contact</router-link></li>

                <li><a href="http://127.0.0.1:8000/login">Log In</a></li>
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
    background-color: #55423d;
    margin-bottom: 20px;

    .container {
        display: flex;
        justify-content: space-between;
        line-height: 120px;
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
                    color: #ffc0ad;
                }
                a:hover {
                    color: #fcd9ce;
                }
            }
        }

    }

}

.active {
    border-bottom: 2px solid #fff;
}




</style>