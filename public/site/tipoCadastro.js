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
      }
   },
   template: await importTemplate('site/components/TipoCadastro.vue')
}