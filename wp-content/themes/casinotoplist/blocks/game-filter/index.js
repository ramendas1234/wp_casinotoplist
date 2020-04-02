/**
 *  BLOCK: Casino List
 */

//  Import CSS.
import './editor.css'
const { __ } = wp.i18n
const { registerBlockType } = wp.blocks
const { RichText } = wp.blockEditor

registerBlockType('casinotoplist/game-filter', {
  title: __( 'Game Filter' ),
  icon: 'tide',
  category: 'casinotoplist',
  keywords: [
    __( 'game filter' ),
//    __( 'casino list rows' ),
  ],
  supports: {
    html: false,
    reusable: false,
    align: false
  },

  // Set up data model for custom block
  attributes: {
//     post_type: {
//          type: 'string',
//      },
  },

  edit( props ) {
      
      const { attributes, className, setAttributes } = props  
      return (
          <div id="block-game-filter" >
                <label className='ctl-common-block'>Game Filter</label>
          </div>
      )
  },
  save ( props ) {
      return null
  },
})