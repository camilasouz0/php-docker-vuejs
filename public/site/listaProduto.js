import { Grid, html } from "https://unpkg.com/gridjs?module";

async function importTemplate(name) {
   const res = await fetch(name);
   const html = await res.text();
   return html;
}
 
export default {
    props: {
        search: { type: String },
    },
    data() {
        return { }
    },
    mounted() {
        new Grid({
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
                name: "#",
                    formatter: (cell) => { return '#'},
                    width: "10%"
                },
                {
                name: 'Nome',
                    formatter: (cell) => { return cell != null ? `${cell}` : '';},
                },
                {
                name: 'Ações',
                    formatter: (cell, row) => html(`
                        <div class="row">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary ml-1 mb-1"><i class="fa fa-eye"></i> Ver</button>
                                <button type="button" class="btn btn-info ml-1 mb-1"><i class="fa fa-edit"></i> Editar</button>
                            </div>
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
    },
    template: await importTemplate('site/components/ListaProduto.vue')
}