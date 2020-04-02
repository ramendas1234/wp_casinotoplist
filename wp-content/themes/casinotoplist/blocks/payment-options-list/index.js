/**
 *  BLOCK: Payment Options List
 */

        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components

registerBlockType('casinotoplist/payment-options-list', {
    title: __('Payment List'),
    icon: 'visibility',
    category: 'casinotoplist',
    keywords: [
        __('payment options list'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        title: {
            type: 'string',
        },
       
        qty: {
            type: 'string',

        },
        group_id: {
            type: 'string',

        },
        
    },

    edit(props) {

        var title = props.attributes.title;
        var qty = props.attributes.qty;
        var group_id = props.attributes.group_id;
        //console.log(qty);
        function onChangeTitle(content) {
            props.setAttributes({title: content})
        }
        
        function onChangeQty(content) {
            props.setAttributes({qty: content})
        }
        
        function onChangeGroupId(content) {
            props.setAttributes({group_id: content})
        }
       
        return (
                <div id="block-payment-option" >
                    <TextControl
                        label={__('Title')}
                        onChange={onChangeTitle} 
                        value={title}
                        placeholder={__('Title')}
                        />
                    <TextControl
                        label={__('Quantity')}
                        onChange={onChangeQty} 
                        value={qty}
                        placeholder={__('Quantity')}
                        />
                    <TextControl
                        label={__('Group Id')}
                        onChange={onChangeGroupId} 
                        value={group_id}
                        placeholder={__('Group Id')}
                        />    
                </div>
                )
    },
    save(props) {
        return null
    },
})