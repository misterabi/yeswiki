export default {
  field: {
    label: "Etherpad",
    name: "nom du pad",
    attrs: { type: "etherpad" },
    icon: '<i class="far fa-calendar-alt"></i>',
  },
  defaultIdentifier: 'bf_date_debut_evenement',
  attributes: {
    urlField: {
      label: 'Champ nom du Pad',
      type: 'text',
      value: '',
    },
  },
  disabledAttributes: [
    'required',
    'value',
  ],
  advancedAttributes: ['read', 'write', 'semantic', 'today_button'],
  attributesMapping: { 
    0: 'type',
    1: 'name',
    2: 'label',
    3: 'urlField',
   },
  renderInput(fieldData) {
    return {
      fieldData: ''
    }
  },
}
