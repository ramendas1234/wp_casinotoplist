/**
 *  BLOCK: High Roller Casino List
 */
//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const {TextControl} = wp.components
const {RadioControl} = wp.components
registerBlockType('casinotoplist/high-roller-casino-list', {
    title: __('High Roller Casino List'),
    icon: 'sos',
    category: 'casinotoplist',
    keywords: [
        __('high roller casino list'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        group_id: {
            type: 'string',
        },
        quantity: {
            type: 'string',
        },
        welcom_bonus: {
            type: 'string',
            default: 'yes'
        },
        min_deposit: {
            type: 'string',
            default: 'yes'
        },
        min_wager: {
            type: 'string',
            default: 'yes'
        },
        //option:'a'


    },

    edit(props) {

        var group_id = props.attributes.group_id;
        var quantity = props.attributes.quantity;
        var welcom_bonus = props.attributes.welcom_bonus;
        var min_deposit = props.attributes.min_deposit;
        var min_wager = props.attributes.min_wager;

        function onChangeGroupID(content) {
            props.setAttributes({group_id: content});
        }
        function onChangeQuantity(content) {
            props.setAttributes({quantity: content});
        }
        var onChangeWelcome = function (content) {
            props.setAttributes({welcom_bonus: content});
        };
        var onChangeMin = function (content) {
            props.setAttributes({min_deposit: content});
        };
        var onChangeMinWarger = function (content) {
            props.setAttributes({min_wager: content});
        };
        var options_value = [{
                label: 'Yes',
                value: 'yes'
            }, {
                label: 'No',
                value: 'no'
            }];

        return (
                <div id="block-high-roller-list" >
                    <TextControl
                        label={__('Group ID')}
                        onChange={onChangeGroupID} 
                        value={group_id}
                        placeholder={__('group id')}
                        />            
                    <TextControl
                        label={__('Quantity')}
                        onChange={onChangeQuantity} 
                        value={quantity}
                        placeholder={__('quantity')}
                        />
                    <RadioControl
                        label="Welcome Bonus"
                        help="Do you want to show welcome bonus ?"
                        selected={ welcom_bonus }
                        options={options_value}
                        onChange={onChangeWelcome}
                        />
                    <RadioControl
                        label="Minimum Deposit"
                        help="Do you want to show minimum deposit ?"
                        selected={ min_deposit }
                        options={options_value}
                        onChange={onChangeMin}
                        />
                    <RadioControl
                        label="Minimum Warger"
                        help="Do you want to show minimum warger ?"
                        selected={ min_wager }
                        options={options_value}
                        onChange={onChangeMinWarger}
                        />
                </div>
                )
    },
    save(props) {
        return null
    },
})