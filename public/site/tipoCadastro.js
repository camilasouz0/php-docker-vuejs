async function importTemplate(name) {
   const res = await fetch(name);
   const html = await res.text();
   return html;
}

export default {
   data() {
       return {  }
   },
   methods: {
      redirectGroup() {
         return window.location.href = '/grupo.html'
      },
      redirectCategoria() {
         return window.location.href = '/categoria.html'
      },
      redirectImposto() {
         return window.location.href = '/imposto.html'
      }
   },
   template: await importTemplate('site/components/TipoCadastro.vue')
}