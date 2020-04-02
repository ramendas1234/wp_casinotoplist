/**
 *  BLOCK: Best Online Casino
 */

//  Import CSS.
import './editor.css'
const { __ } = wp.i18n
const { registerBlockType } = wp.blocks
const { RichText } = wp.blockEditor
const { TextControl } = wp.components
const { TextareaControl } = wp.components

registerBlockType('casinotoplist/best-online-casino', {
  title: __( 'Best Online Casino' ),
  icon: 'tickets-alt',
  category: 'casinotoplist',
  keywords: [
    __( 'best online casino list' ),
    __( 'best online casino list rows' ),
  ],
  supports: {
    html: false,
    reusable: false,
    align: false
  },

  // Set up data model for custom block
  attributes: {
      casino_list_title: {
          type: 'string',
      },
      casino_list_description: {
          type: 'string',
      },
      best_online_casino_section_heading: {
          type: 'string',
      },
      group_id: {
          type: 'string',
      },
      qty: {
          type: 'string',
      },
  },

  edit( props ) {
      var casino_list_title = props.attributes.casino_list_title ;
      var casino_list_description = props.attributes.casino_list_description ;
      var best_online_casino_section_heading = props.attributes.best_online_casino_section_heading ;
      var group_id = props.attributes.group_id ;
      var qty = props.attributes.qty;
      function onChangecasinoListTitle ( content ) {
          props.setAttributes({casino_list_title: content})
      }
      function onChangecasinoListDescription ( content ) {
          props.setAttributes({casino_list_description: content})
      }
      function onChangecasinoSectionHeading ( content ) {
          props.setAttributes({best_online_casino_section_heading: content})
      }
      function onChangegroupId ( content ) {
          props.setAttributes({group_id: content})
      }
      function onChangeQty ( content ) {
          props.setAttributes({qty: content})
      }
        
      return (
          <div id="block-best-online-casino-list" className={props.className}>
                
                <TextControl
                    label="Casino List Title"
                    onChange={onChangecasinoListTitle} 
                    value={casino_list_title}
                    placeholder="Casino List Title"
                />
                <TextareaControl
                    label="Casino List Description"
                    onChange={onChangecasinoListDescription} 
                    value={casino_list_description}
                    placeholder="Casino List Description"
                />
                <TextControl
                    label="Best Online Casino Section Heading"
                    onChange={onChangecasinoSectionHeading} 
                    value={best_online_casino_section_heading}
                    placeholder="Online Casino Section Heading"
                />
                <TextControl
                    label="Group ID"
                    onChange={onChangegroupId} 
                    value={group_id}
                    placeholder="Casino toplist group ID"
                />
                <TextControl
                    label="Quantity"
                    onChange={onChangeQty} 
                    value={qty}
                    placeholder="Number of casinos to show"
                />
          </div>
      )
  },
  save ( props ) {
      return null
  },
})