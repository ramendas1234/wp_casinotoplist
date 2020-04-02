/**
 *  BLOCK: Casino List
 */

//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components

registerBlockType('casinotoplist/casino-promotion-rows', {
    title: __('Casino Promotion Rows'),
    icon: 'screenoptions',
    category: 'casinotoplist',
    keywords: [
        __('casino promotion rows'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        promotion_title: {
            type: 'string',
        },
        qty: {
            type: 'number',

        },
    },

    edit(props) {

        var promotion_title = props.attributes.promotion_title;
        var qty = props.attributes.qty;
        function onChangeTitle(content) {
            props.setAttributes({promotion_title: content})
        }
        function onQtyTitle(content) {
            props.setAttributes({qty: content})
        }
        return (
                <div id="block-vertical-casino-promotion" >
                    <TextControl
                        label={__('Casino Promotion Rows Title')}
                        onChange={onChangeTitle} 
                        value={promotion_title}
                        placeholder={__('Title')}
                        />
                    <TextControl
                        label={__('How many promotion want to show')}
                        onChange={onQtyTitle} 
                        value={qty}
                        placeholder={__('show number of promotion')}
                        />
                </div>
                )
    },
    save(props) {
        return null
    },
})