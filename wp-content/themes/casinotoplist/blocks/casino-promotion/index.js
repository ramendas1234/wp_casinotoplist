/**
 *  BLOCK: Casino Promotion
 */
//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const {TextControl} = wp.components
const {RadioControl} = wp.components
const {SelectControl, FormToggle} = wp.components
registerBlockType('casinotoplist/casino-promotion', {
    title: __('Casino Promotion'),
    icon: 'admin-site-alt',
    category: 'casinotoplist',
    keywords: [
        __('casino promotion'),
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
        quantity: {
            type: 'string',
        },
        style: {
            type: 'string',
        },
        show_term: {
            type: 'string',
        },
        show_time: {
            type: 'string',
        },
        button_text: {
            type: 'string',
            default: 'Qualify Now'
        },
        check_all_promotion:{
        type:'boolean',
        default:false
    },
    all_promotion_url:{
        type:'string',
    }

    },

    edit(props) {

        var quantity = props.attributes.quantity;
        var title = props.attributes.title;
        var style = props.attributes.style;
        var show_term = props.attributes.show_term;
        var show_time = props.attributes.show_time;
        var button_text = props.attributes.button_text;
        var check_all_promotion = props.attributes.check_all_promotion;
        var all_promotion_url = props.attributes.all_promotion_url;
        
        function onChangeTitle(content) {
            props.setAttributes({title: content});
        }
        function onChangeQuantity(content) {
            props.setAttributes({quantity: content});
        }
        var onChangeStyle = function (content) {
            props.setAttributes({style: content});
        };
        var onChangeShowTerm = function (content) {
            props.setAttributes({show_term: content});
        };
        var onChangeShowTime = function (content) {
            props.setAttributes({show_time: content});
        };
        var onChangeButtonText = function (content) {
            props.setAttributes({button_text: content});
        };
        var onChangeChekAll = function (state) {
            props.setAttributes({check_all_promotion: (!check_all_promotion)?true:false});
            
        }
        var onChangePromotionUrl = function (content) {
            props.setAttributes({all_promotion_url: content});
        };
        var PromotionslistUrl = function(props){
            return (props.value)?<TextControl
                     label={__('All Promotions Url')}
                     onChange={onChangePromotionUrl} 
                     value={all_promotion_url}
                     placeholder={__('Please enter promotions listing url')}
                     /> : '' ;
        }



        return (
                <div id="block-casino-promotion" >
                
                    <TextControl
                        label={__('Section Title')}
                        onChange={onChangeTitle} 
                        value={title}
                        placeholder={__('Add section title')}
                        />
                    <TextControl
                        label={__('Quantity')}
                        onChange={onChangeQuantity} 
                        value={quantity}
                        placeholder={__('quantity')}
                        />
                    <SelectControl
                        label="Style"
                        value={ style }
                        options={ [
                    {label: 'Select Style', value: '' },
                        { label: 'Home Cards', value: 'home-cards' },
                        { label: 'Cards', value: 'cards' },
                        { label: 'Rows', value: 'rows' }
                
                        ] }
                        onChange={onChangeStyle} 
                        />
                
                    <SelectControl
                        label="Show Term"
                        value={ show_term }
                        options={ [
                                        {label: 'No', value: 'false' },
                        { label: 'Yes', value: 'true' },                            
                        ] }
                        onChange={onChangeShowTerm} 
                        />
                    <SelectControl
                        label="Show Time Left"
                        value={ show_time }
                        options={ [
                                                    {label: 'No', value: 'false' },
                        { label: 'Yes', value: 'true' },                            
                        ] }
                        onChange={onChangeShowTime} 
                        />
                
                    <TextControl
                        label={__('Promotion Button Text')}
                        onChange={onChangeButtonText} 
                        value={button_text}
                        placeholder={__('Promotion button text')}
                        />
                    <div class="components-base-control">
                                        <label class="components-base-control__label">Check All Promotions?</label>    
                                    <FormToggle 
                                        checked={check_all_promotion}
                                        onChange={onChangeChekAll}        
                                    />
                                        </div>
                    <PromotionslistUrl value={ check_all_promotion } />    
                </div>
                                                            )
                                                },
                                                save(props) {
                                                    return null
                                                },
                                            })