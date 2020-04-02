/**
 *  BLOCK: Casino List
 */
//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components
const { RadioControl } = wp.components
registerBlockType('casinotoplist/casino-list', {
    title: __('Casino List'),
    icon: 'sos',
    category: 'casinotoplist',
    keywords: [
        __('casino list'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        quantity: {
            type: 'string',
        },
         option: {
            type: 'string',
            default:'no'
        },
        //option:'a'
        
        
    },

    edit(props) {

        var quantity = props.attributes.quantity;
        var option = props.attributes.option;
        
        function onChangeQuantity(content) {
            props.setAttributes({quantity: content});
        }
        var onChangeRadio = function (content) {
            props.setAttributes({option: content});
        };
        var options_value = [{
                    label: 'Yes',
                    value: 'yes'
                }, {
                    label: 'No',
                    value: 'no'
                }];
        
        return (
                <div id="block-casino-list" >
                    <TextControl
                        label={__('Quantity')}
                        onChange={onChangeQuantity} 
                        value={quantity}
                        placeholder={__('quantity')}
                        />
                    <RadioControl
        label="Terms & Condition"
        help="Do you want to show t&c ?"
        selected={ option }
        options={options_value}
        onChange={onChangeRadio}
    />
                </div>
                )
    },
    save(props) {
        return null
    },
})