async function importTemplate(name) {
  const res = await fetch(name);
  const html = await res.text();
  return html;
}

export default {
   data() {
     return {  }
   },
   template: await importTemplate('site/components/Create.vue')
}