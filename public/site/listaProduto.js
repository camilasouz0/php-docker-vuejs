import { Grid, html } from "https://unpkg.com/gridjs?module";

async function importTemplate(name) {
   const res = await fetch(name);
   const html = await res.text();
   return html;
}
 
export default {
    props: {
        search: { type: Boolean },
    },
    data() {
        return { }
    },
    mounted() {
        this.gridjs = new Grid({
            language: {
                'search': {
                    'placeholder': '🔍 Search...'
                },
                    'pagination': {
                    'previous': '⬅️',
                    'next': '➡️',
                    'showing': '😃 Mostrando',
                    'results': () => 'resultados',
                    'to' : 'de',
                    'of': 'até'
                }
            },
            columns: [
                {
                    name: 'id',
                    hidden: true
                },
                {
                name: 'Nome',
                    formatter: (cell) => { return cell != null ? `${cell}` : '';},
                },
                {
                name: 'Código',
                    formatter: (cell) => { return cell != null ? `${cell}` : '';},
                },
                {
                name: 'Preço',
                    formatter: (cell) => { return cell != null ? `${cell}` : '';},
                },
                {
                name: 'Imposto',
                    formatter: (cell) => { return cell != null ? `${cell}` : '';},
                },
                {
                name: 'Imagem',
                    formatter: (cell) => html(`
                        <img src="${cell}" width="100">
                    `),
                },
                {
                name: 'Ativo',
                    formatter (cell) {
                        if(cell == 1) {
                        return html(`
                        <label class="toggle-switchy">
                            <input type="checkbox" checked>
                            <span class="toggle checkbox-${cell}">
                            <span class="switch"></span>
                            </span>
                        </label>
                        `)
                        } else {
                        return html(`
                        <label class="toggle-switchy">
                            <input type="checkbox" class="id-${cell}">
                            <span class="toggle checkbox-${cell}">
                            <span class="switch"></span>
                            </span>
                        </label>
                        `)
                        }
                    }
                },
                {
                name: 'Ações',
                    formatter: (cell, row) => html(`
                        <div class="row col-10">
                            <button type="button" class="btn btn-primary mb-1"><i class="fa fa-eye"></i> Ver</button>
                            <button type="button" class="btn btn-info mb-1"><i class="fa fa-edit"></i> Editar</button>
                        </div>
                    `),
                },
            ],
            sort: true,
            search: this.$props.search,
            pagination: {
                limit: 5,
            },
            server: {
                url: '/index.php/produto/lista?',
                    then (data) {
                        for(let i=0; i < document.querySelectorAll("#lista-grupo > div > div.gridjs-footer > div > div.gridjs-pages > button").length; i++){
                            document.querySelectorAll("#lista-grupo > div > div.gridjs-footer > div > div.gridjs-pages > button")[i].setAttribute('type', 'button');
                        }
                        if(data) {
                            return JSON.parse(data).map(item => [
                                item.id,
                                item.name,
                                item.code,
                                item.value,
                                item.id,
                                item.img,
                                item.id,
                                item.id
                            ])
                        }
                    }
                },
                total (data) {
                    return data.length;
                },
            },
        ).render(document.getElementById("lista-grupo"));

        const grid = this.gridjs;

        this.gridjs.on('cellClick', function (args, param) {
            if(args.target.classList.length > 1) {
                let id = args.target.classList[1].split('-')[1]
                console.log(id,args.target.classList[1].split('-'))
                axios.get('/index.php/produto/update?id='+id)
                .then(response => {
                    if(response) {
                        // grid.forceRender();
                        Swal.fire({
                            title: "Sucesso!",
                            timer: 15000,
                            icon: 'success',
                        });
                    }
                }).then(function (response) {
                })
            }
        });
    },
    template: await importTemplate('site/components/ListaProduto.vue')
}