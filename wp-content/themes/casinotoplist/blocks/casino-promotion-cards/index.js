/**
 *  BLOCK: Casino Promotion List
 */

//  Import CSS.
import './editor.css'
const { __ } = wp.i18n
const { registerBlockType } = wp.blocks
const { RichText } = wp.blockEditor
const { TextControl } = wp.components

registerBlockType('casinotoplist/casino-promotion-cards', {
  title: __( 'Casino Promotion Cards' ),
  icon: 'megaphone',
  category: 'casinotoplist',
  keywords: [
    __( 'casino promotion cards' ),
  ],
  supports: {
    html: false,
    reusable: false,
    align: false
  },

  // Set up data model for custom block
  attributes: {
      qty: {
          type: 'string',
      },
  },

  edit( props ) {
      var qty = props.attributes.qty
      function onChangeQty ( content ) {
          props.setAttributes({qty: content})
      }              
        
      return (
          <div id="block-casino-promotion-list" >
                <TextControl
                    label={__('Quantity')}
                    onChange={onChangeQty} 
                    value={qty}
                    placeholder={__('Number of casinos to show')}
                />
          </div>
      )
  },
  save ( props ) {
      return null
  },
})