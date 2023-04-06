<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="76x76" href="./../public/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="./../public/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="./../public/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="./../public/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="./../public/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="./../public/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="./../public/css/themify-icons.css" rel="stylesheet">
    <title>Produtos</title>
</head>
<body>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/vue-router@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.js"></script>
    <div id="app">
        <Sidebar />
        <h1>h1</h1>
        <product></product>
        kkdsajf
    </div>
</body>
</html>

<template id="product">
    <button @click="getProducts()">buscar</button>
    <ul>
        <li v-for="produto in produtos" key="produto.id">
            {{produto['id']}}
        </li>
    </ul>
</template>

<script type="module">
    const { createApp } = Vue;
    import Sidebar from './Sidebar.vue';
    const app = createApp({});

    const router = VueRouter.createRouter({
        history: VueRouter.createWebHashHistory(),
        routes: [
            {
                path: "/",
                name: "Sidebar",
                component: Sidebar
            }

        ]
    })

    app.component('product',{
        data() {
            return {
                produtos: null,
            }
        },
        methods: {
            getProducts() {
                console.log('aqu')
                axios({
                    url: "/lista",
                    method: "get",
                })
                .then((res) => {
                    this.produtos = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
            }
        },
        template: "#product",
    });
    
    app.component('Sidebar', Sidebar)
    app.use(router);
    // router.push({ name: 'sidebar'})
    app.mount("#app");
</script>

