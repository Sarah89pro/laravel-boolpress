<template>
    <header>

        <nav>
            <ul>
                <li><router-link :to="{name: 'home'}">BoolPress</router-link></li>
                <li><router-link :to="{name: 'home'}">Home</router-link></li>
                <li><router-link :to="{name: 'about'}">About</router-link></li>
                <li><router-link :to="{name: 'blog'}">Blog</router-link></li>
            </ul>
        </nav>
    </header>
  
</template>

<script>


export default {
    name: 'Header'

}
</script>

<style lang="scss" scoped>

header {
    background-color: black;
    display: flex;
    padding-left: 55px;
    color: grey;
    line-height: 120px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 16px;

    nav {
        display: flex;
        justify-content: space-between;
        

        nav ul {
            display: flex;
            
        
            li {
                margin-left: 20px;
                text-transform: uppercase;
        
                a {
                    color: gray;
                }
                a:hover {
                    color: #fff;
                }
            }
        }    
    }
}

.active {
    color: #fff;
    border-bottom: 2px solid #fff;
}

</style>