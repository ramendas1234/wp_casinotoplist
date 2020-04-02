/**
 *  BLOCK: Casino Toplist
 */
//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const {TextControl} = wp.components
const {FormToggle} = wp.components
const {SelectControl} = wp.components
registerBlockType('casinotoplist/casino-toplist', {
    title: __('Casino Toplist'),
    icon: 'tickets-alt',
    category: 'casinotoplist',
    keywords: [
        __('casino list'),
        __('casino top list'),
        __('top list'),
        __('toplist'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        heading: {
            type: 'string',
        },
        group_id: {
            type: 'string',
        },
        style: {
            type: 'string',
        },
        bonus_type: {
            type: 'string',
        },
        show_load_more: {
            type: 'string',
        },
        show_supported_casino: {
            type: 'string',
        },
        supported_casino: {
            type: 'string',
        },
        supported_id: {
            type: 'string',
        },

        show_term_link: {
            type: 'string',
        },
        term_text: {
            type: 'string',
        },
        term_link: {
            type: 'string',
        },
        start_at_desktop: {
            type: 'string',
        },
        qty_desktop: {
            type: 'string',
        },
        start_at_mobile: {
            type: 'string',
        },
        qty_mobile: {
            type: 'string',
        },
        load_more_qty: {
            type: 'string',
        },
        check_all_casino:{
        type:'boolean',
        default:false
    },
    all_casino_url:{
        type:'string',
    }

    },

    edit(props) {

        var heading = props.attributes.heading;
        var group_id = props.attributes.group_id;
        var bonus_type = props.attributes.bonus_type;
        var style = props.attributes.style;
        var show_load_more = props.attributes.show_load_more;
        var show_term_link = props.attributes.show_term_link;
        var term_text = props.attributes.term_text;
        var term_link = props.attributes.term_link;
        var show_supported_casino = props.attributes.show_supported_casino;
        var supported_casino = props.attributes.supported_casino;
        var supported_id = props.attributes.supported_id;
        var start_at_desktop = props.attributes.start_at_desktop;
        var qty_desktop = props.attributes.qty_desktop;
        var start_at_mobile = props.attributes.start_at_mobile;
        var qty_mobile = props.attributes.qty_mobile;
        var load_more_qty = props.attributes.load_more_qty;
        var check_all_casino = props.attributes.check_all_casino;
        var all_casino_url = props.attributes.all_casino_url;



        function onChangeHeading(content) {
            props.setAttributes({heading: content});
        }
        function onChangeGroupId(content) {
            props.setAttributes({group_id: content});
        }
        function onChangeType(content) {
            props.setAttributes({bonus_type: content});
        }
        
        var onChangeStyle = function (content) {
            props.setAttributes({style: content});
        };
        var onChangeLoadMore = function (content) {
            props.setAttributes({show_load_more: content});
        };
        var onChangeShowTermLink = function (content) {
            props.setAttributes({show_term_link: content});
        };
        var onChangeTermText = function (content) {
            props.setAttributes({term_text: content});
        };
        var onChangeTermLink = function (content) {
            props.setAttributes({term_link: content});
        };
        var onChangeShowSupportedCasino = function (content) {
            props.setAttributes({show_supported_casino: content});
        };
        var onChangeSupportedCasino = function (content) {
            props.setAttributes({supported_casino: content});
        };
        var onChangeSupportedId = function (content) {
            props.setAttributes({supported_id: content});
        };
        var onChangeStartDesktop = function (content) {
            props.setAttributes({start_at_desktop: content});
        };
        var onChangeQtyDesktop = function (content) {
            props.setAttributes({qty_desktop: content});
        };
        var onChangeStartMobile = function (content) {
            props.setAttributes({start_at_mobile: content});
        };
        var onChangeQtyMobile = function (content) {
            props.setAttributes({qty_mobile: content});
        };
        var onChangeLoadMoreQty = function (content) {
            props.setAttributes({load_more_qty: content});
        };
        var onChangeChekAll = function (state) {
            props.setAttributes({check_all_casino: (!check_all_casino)?true:false});
            
        }
        var onChangeCasinoUrl = function (content) {
            props.setAttributes({all_casino_url: content});
        };
        var CasinolistUrl = function(props){
            return (props.value)?<TextControl
                     label={__('Check All Casino Url')}
                     onChange={onChangeCasinoUrl} 
                     value={all_casino_url}
                     placeholder={__('Please enter casino listing url')}
                     /> : '' ;
        }
        var Term = function (props){
            return(
                    <div>
                    <TextControl
                     label={__('Term text')}
                     onChange={onChangeTermText} 
                     value={term_text}
                     placeholder={__('Term text')}
                     />
                     
                     <TextControl
                     label={__('Term link')}
                     onChange={onChangeTermLink} 
                     value={term_link}
                     placeholder={__('Term link')}
                     />
                    
                    </div>
                    ) 
        }
        
        function Software(props) {
            return    <TextControl
                label={__('Software ID')}
                onChange={onChangeSupportedId} 
                value={supported_id}
                placeholder={__('Software ID')}
                />
        }
        function Payment(props) {
            return    <TextControl
                label={__('Payment Options ID')}
                onChange={onChangeSupportedId} 
                value={supported_id}
                placeholder={__('Payment Options ID')}
                />
        }

        function SupportedCasino(props) {
            return <SelectControl
                label="Supported casino For"
                value={ supported_casino }
                options={ [
                            {label: '--choose one--', value: '' },
                { label: 'Software Provider', value: 'software_provider' },
                { label: 'Payment Methods', value: 'payment_method' },    
            
                ] }
                onChange={onChangeSupportedCasino} 
                />;

                        }
                        function ShowTerm(props) {
                            if (props.value == 'yes') {
                                return <Term />;
                            } else {
                                return '';
                            }
                        }
                        function Abc(props) {
                            if (props.value == 'yes') {
                                return <SupportedCasino />;
                            } else {
                                return '';
                            }
                        }
                        function SupportedField(props) {
                            if ((typeof supported_casino !== "undefined" || supported_casino != '') && show_supported_casino == 'yes') {
                                if (props.value == 'software_provider') {
                                    return <Software />;
                                } else if (props.value == 'payment_method') {
                                    return <Payment />;
                                } else {
                                    return '';
                                }
                            } else {
                                return '';
                            }

                        }


                        return (
                                <div id="block-casino-list" >
                                    <TextControl
                                        label={__('Heading')}
                                        onChange={onChangeHeading} 
                                        value={heading}
                                        placeholder={__('Heading')}
                                        />
                                    <TextControl
                                        label={__('Group ID')}
                                        onChange={onChangeGroupId} 
                                        value={group_id}
                                        placeholder={__('Group ID')}
                                        />
                                    <SelectControl
                                        label="Bonus type"
                                        value={ bonus_type }
                                        options={ [
                                    {label: 'Select bonus type', value: '' },
                                        { label: 'High Roller', value: 'high_roller' },
                                        { label: 'Cash Back', value: 'cash_back' },
                                        { label: 'First Deposit', value: 'first_deposit' },
                                        { label: 'Lotto', value: 'lotto' },
                                        { label: 'No Deposit', value: 'no_deposit' },
                                        ] }
                                        onChange={onChangeType} 
                                        />
                                    
                                    <SelectControl
                                        label="Style"
                                        value={ style }
                                        options={ [
                                                                {label: 'Rows', value: 'rows' },
                                        { label: 'Rows with Pros Cons', value: 'rows-pros-cons' },    
                                        { label: 'Casino High Roller', value: 'casino-roller' },    
                                        { label: 'Flex', value: 'flex' },
                                        { label: 'Mini Rows', value: 'mini-rows' },
                                        { label: '2 Column', value: 'col-2' },
                                        { label: 'Small Grid', value: 'grid-small' },
                                        { label: 'Table', value: 'table' },
                                        { label: 'Rows With Filter', value: 'filter' },
                                        ] }
                                        onChange={onChangeStyle} 
                                        />
                                        <TextControl
                                        label={__('Start At Desktop')}
                                        onChange={onChangeStartDesktop} 
                                        value={start_at_desktop}
                                        placeholder={__('start at desktop eg.2')}
                                        />
                                        <TextControl
                                        label={__('Desktop Quantity')}
                                        onChange={onChangeQtyDesktop} 
                                        value={qty_desktop}
                                        placeholder={__('desktop quantity')}
                                        />
                                        <TextControl
                                        label={__('Start At Mobile')}
                                        onChange={onChangeStartMobile} 
                                        value={start_at_mobile}
                                        placeholder={__('start at mobile eg.2')}
                                        />
                                        <TextControl
                                        label={__('Mobile Quantity')}
                                        onChange={onChangeQtyMobile} 
                                        value={qty_mobile}
                                        placeholder={__('mobile quantity')}
                                        />
                                        <TextControl
                                        label={__('Load More Quantity')}
                                        onChange={onChangeLoadMoreQty} 
                                        value={load_more_qty}
                                        placeholder={__('enter loadmore quantity')}
                                        />
                                        <div class="components-base-control">
                                        <label class="components-base-control__label">Check All Casino?</label>    
                                    <FormToggle 
                                        checked={check_all_casino}
                                        onChange={onChangeChekAll}        
                                    />
                                        </div>
                                     
                                    <CasinolistUrl value={ check_all_casino } />
                                    <SelectControl
                                        label="Show Load More"
                                        value={ show_load_more }
                                        options={ [
                                                                                                        {label: 'No', value: 'no' },
                                        { label: 'Yes', value: 'yes' },                            
                                        ] }
                                        onChange={onChangeLoadMore} 
                                        />
                                    <SelectControl
                                        label="Do you want to show supported casino"
                                        value={ show_supported_casino }
                                        options={ [
                                        {label: 'No', value: 'no' },
                                        { label: 'Yes', value: 'yes' },                            
                                        ] }
                                        onChange={onChangeShowSupportedCasino} 
                                        />
                                    <Abc value={show_supported_casino}/>
                                    <SupportedField value={supported_casino}/>
                                    <SelectControl
                                        label="Show Term Link"
                                        value={ show_term_link }
                                        options={ [
                                        {label: 'No', value: 'no' },
                                        { label: 'Yes', value: 'yes' },                            
                                        ] }
                                        onChange={onChangeShowTermLink} 
                                        />
                                    <ShowTerm value={show_term_link} />    
                                    
                                </div>
                        )
                    },
                    save(props) {
                        return null
                    },
                })