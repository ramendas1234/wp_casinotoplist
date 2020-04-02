/**
 *  BLOCK: Casino List
 */

        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components
const { TextareaControl } = wp.components
registerBlockType('casinotoplist/single-advertisment-casino', {
    title: __('Single Advertisment Casino'),
    icon: 'sos',
    category: 'casinotoplist',
    keywords: [
        __('single advertisment casino'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        short_text: {
            type: 'string',
        },
        product_id: {
            type: 'string',

        },
    },

    edit(props) {

        var short_text = props.attributes.short_text;
        var product_id = props.attributes.product_id;
        function onChangeShortText(content) {
            props.setAttributes({short_text: content});
        }
        function onChangeProductId(content) {
            props.setAttributes({product_id: content});
        }
        return (
                <div id="block-special-bonus" >
                    <TextControl
                        label={__('Product Id')}
                        onChange={onChangeProductId} 
                        value={product_id}
                        placeholder={__('product id')}
                        />
                    <TextareaControl
                        label={__('Short text')}
                        onChange={onChangeShortText} 
                        value={short_text}
                        placeholder={__('short text')}
                        />
                </div>
                )
    },
    save(props) {
        return null
    },
})