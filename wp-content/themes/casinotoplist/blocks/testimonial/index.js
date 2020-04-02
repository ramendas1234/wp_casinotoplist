/**
 *  BLOCK: Testimonial
 */

//  Import CSS.
import './editor.css'

const { __ } = wp.i18n
const { registerBlockType } = wp.blocks
const { TextControl } = wp.components

registerBlockType('casinotoplist/testimonial', {
  title: __( 'Testimonial' ),
  icon: 'format-aside',
  category: 'casinotoplist',
  keywords: [
    __( 'testimonial' ),
    __( 'testimonial slider' ),
  ],

  // Enable or disable support for low-level features
  supports: {
    // Turn off ability to edit HTML of block content
    html: false,
    // Turn off reusable block feature
    reusable: false,
    // Add alignwide and alignfull options
    align: false
  },

  // Set up data model for custom block
  attributes: {
    testimonial_title: {
    type: 'string',
    selector: 'js-testimonial-title'
    },
  },

  // The UI for the WordPress editor
  edit: props => {
      var testimonial_title = props.attributes.testimonial_title ;
      function onChangeTitle ( content ) {
          props.setAttributes({testimonial_title: content})
      }
    return (
          <div id="block-testimonials" className={props.className}>
                
                <TextControl
                    label="Testimonial Title"
                    onChange={onChangeTitle} 
                    value={testimonial_title}
                    placeholder={__('Testimonial Title')}
                />
          </div>
      )
  },

  // The output on the live site
  save: props => {
    return null
  }
})