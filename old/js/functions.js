export async function fetchJson (url, options = {}) {
   const headers = {Accept: 'aplication/json', ...options.headers}
   const r = await fetch(url, {...options, headers})
   if (r.ok) {
      return r.json()
   }
   throw new Error('Impossible de contacter le server')
}

export function myCreateElement(tagName, attributes = {}) {
   const element = document.createElement(tagName)
   for (const [attribute, value] of Object.entries(attributes)) {
      if (value !== null) {
         element.setAttribute(attribute, value)
      }
   }
   return element
}


export function alertDiv () {
   const alertElement = myCreateElement('div', {
      class: 'alert',
      role: 'alert'
   })
   alertElement.innerText = "Impossible de charger la page"
   document.body.prepend(alertElement)
}
