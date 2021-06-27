<template>
  <div class="container">
      <h1>Are you Lost?</h1>

    <p>We can't seem to find the page you're lookin for!</p>

    <h2>Here are some useful links instead:</h2>

    <nav>
        <ul>
            <!-- links just for fun -->
            <li><a href="http://tedmosbyisajerk.com/">The Awful Truth</a></li>
            <li><a href="http://www.goliathbank.com/">Goliath National Bank</a></li>
            <li><a href="http://grademyteacher.net/">Grade My Teacher</a></li>

            <!-- links back to the website -->
            <li><router-link :to="{name: 'home'}">Home</router-link></li>
            <li><a href="http://127.0.0.1:8000/login">Log In</a></li>

        </ul>    
    </nav>
  </div>
</template>

<script>
export default {
    name: 'NotFound'

}
</script>

<style>
h1,
p,
ul {
    margin-bottom: 20px;
}

a {
    color: rgb(94, 93, 93);
}
a:hover {
    color: rgb(160, 160, 160);
}

</style>