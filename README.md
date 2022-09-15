Customizable RecordDriver Module to use as a module for VuFind 5

Add a file "solrmarc.yaml" with the following content to you [VUFIND_LOCAL_DIR]/config/vufind/ directory:

```
---
# Listing of data to be read from marc bibliographic data
#
# Format is:
# <name of the data set>:
#   category:               <categories corresponding to categories chosen in the core-template>
#                               title should be set; other categories are mandatory
#   originalletters:        <yes|no> whether item in original letters should be
#                               shown or not (see marc 880)
#   <main field>:           at least one should be set; fields with a leading 0 should be quoted
#                               if only parent methods are used the main field is '000'
#     conditions:           conditions which should be fulfilled if the data is read
#       - [<item>, <key>, <value>]          <item> is either field or indicator
#                                           <key> is the name of the field or indicator
#                                           <value> is the value it should have
#     parent:               use a parent method (from SolrDefault driver)
#       - [<method name>]       the method to use
#     subfields:            only read the fields
#       - [<field list>]        list of fields to read
#     <subfield>:           enhanced processing of a subfield
#       - [name, <name>]                     name it
#       - [replace, <from>, <to>]            replace a substring from <from> to <to> (using a regex)
#       - [match, <what>, <which>]           match a substring (<what>) and use the <which>th parantesis
#                                                (using a regex)
#       - [function, <php-function>]         use th return value of a php-function
#
#-----------------------------------------------------------------------------------
#
ShortTitle:
  category: title
  originalletters: yes 
  245:
    subfields:
      - [a]
SubTitle:
  category: title
  245:
    subfields:
      - [b]
TitleSection:
  category: title
  245:
    subfields:
      - [n]
    p:
      - [name, extended]
TitleStatement:
  category: title
  245:
    subfields:
      - [c]
Summary:
  category: title
  520:
    subfields:
      - [a]
WorkTitle:
  category: title2
  130:
    a:
      - [name, title]
      - [replace, '@', '']
  240:
    a:
      - [name, title]
      - [replace, '@', '']
  100:
    a:
      - [name, person]
    c:
      - [name, titles]
    d:
      - [name, dates] 
OtherTitles:
  category: title2
  246:
    subfields:
      - [a]
PreviousTitles:
  category: title2
  780:
    t:
      - [name, title]
    w:
      - [name, id]
      - [match, '\(DE-(599)|(600)\)([0-9xX-]+)', 3]
NewerTitles:
  category: title2
  785:
    t:
      - [name, title]
    w:
      - [name, id]
      - [match, '\(DE-(599)|(600)\)([0-9xX-]+)', 3]
Series:
  category: title2
  490:
    subfields:
    a:
      - [name, title]
      - [match, '^([^<>]+)( <([^<>]+)>(.*))?$', 1]
    a:
      - [name, supplement]
      - [match, '^([^<>]+)( <([^<>]+)>(.*))?$', 3]
    v:
      - [name, volume]
  830:
    subfields:
    v:
      - [name, volume]
    w:
      - [name, ppn]
      - [match, '\(DE-601\)([0-9xX]+)', 1]
Person:
  category: person
  100:
    a:
      - [name, name]
    b:
      - [name, number]
    c:
      - [name, title]
    d:
      - [name, date]
    e:
      - [name, description]
      - [replace, 'in( |$)$', 'In ']
      - [function, 'ucfirst']
  700:
    a:
      - [name, name]
    b:
      - [name, number]
    c:
      - [name, title]
    d:
      - [name, date]
    e:
      - [name, description]
      - [replace, 'in( |$)$', 'In ']
      - [function, 'ucfirst']
Cooperation:
  category: person
  110:
    a:
      - [name, name]
    b:
      - [name, unit]
    c:
      - [name, location]
    d:
      - [name, date]
    e:
      - [name, description]
      - [function, 'ucfirst']
  710:
    a:
      - [name, name]
    b:
      - [name, unit]
    c:
      - [name, location]
    d:
      - [name, date]
    e:
      - [name, description]
      - [function, 'ucfirst']
CongressData:
  category: person
  111:
    a:
      - [name, name]
    c:
      - [name, location]
    d:
      - [name, date]
    e:
      - [name, unit]
  711:
    a:
      - [name, name]
    c:
      - [name, location]
    d:
      - [name, date]
    e:
      - [name, unit]
Performers:
  category: person
  511:
    subfields:
      - [a]
Formats:
  category: description
  '000':
    parent:
      - [getFormats]
Languages:
  category: description
  546:
    parent:
      - [getLanguages]
    subfields:
      - [a]
OriginalLanguage:
  category: description
  '041':
    subfields:
      - [a]
FormNote:
  category: description
  655:
    subfields:
      - [a]
GeneralNotes:
  category: description
  500:
    subfields:
      - [a]
PhysicalDescription:
  category: description
  300:
    subfields:
      - [a, b, c, e]
MapInfos:
  category: description
  255:
    subfields:
      - [a, b, c, d, e, f, g]
SystemDetails:
  category: description
  520:
    subfields:
      - [a]
ISBNs:
  category: description
  '020':
    9:
      - [name, isbn]
ISSNs:
  category: description
  '022':
    a:
      - [match, '([0-9xX-]+)', 1]
PublicationDetails:
  category: publication
  264:
    a:
      - [name, location]
      - [replace, ' ;.*$', '']
    b:
      - [name, name]
    c:
      - [name, date]
  260:
    a:
      - [name, location]
      - [replace, ' ;.*$', '']
    b:
      - [name, name]
    c:
      - [name, date]
URLs:
  category: publication
  856:
    conditions:
      - [field, y, !C]
    u:
      - [name, url]
    3:
       - [name, description]
    z:
      - [name, description]
  555:
    conditions:
      - [field, y, !C]
    u:
      - [name, url]
    a:
       - [name, description]
IncludedItems:
  category: related
  501:
    subfields:
      - [a]
RelationshipNotes:
  category: related
  580:
    subfields:
      - [a]
SecondaryEditions:
  category: related
  533:
    subfields:
      - [a, b, c, d, f]
    e:
      - [name, content]
OtherEditions:
  category: related
  787:
    conditions:
      - [field, i, '*']
    i:
      - [name, fieldType]
    t:
      - [name, fieldDesc]
    w:
      - [name, type]
      - [replace, '^\(DE-600\).+$', 'ZDBID']
      - [replace, '^\(DE-601\).+$', 'PPN']
    w:
      - [name, id]
      - [match, '\(DE-60[01]\)([^()]+)', 1]
NLM:
  category: subject
  '060':
    subfields:
      - [a]
BasicClassifications:
  category: subject
  '084':
    conditions:
      - [field, 2, bcl]
    subfields:
      - [a, 9]
ContainingWork:
  category: related
  773:
    i:
      - [name, prefix]
    t:
      - [name, title]
    z:
      - [name, isn]
      - [match, '\(.+\)([^()]+)', 1]
    x:
      - [name, isn]
      - [match, '\(.+\)([^()]+)', 1]
    w:
      - [name, ppn]
      - [match, '\(.+\)([^()]+)', 1]
    d:
      - [name, location]
    g:
      - [name, issue]
  800:
    i:
      - [name, prefix]
    t:
      - [name, title]
    z:
      - [name, isn]
      - [match, '\(.+\)([^()]+)', 1]
    x:
      - [name, isn]
      - [match, '\(.+\)([^()]+)', 1]
    w:
      - [name, ppn]
      - [match, '\(.+\)([^()]+)', 1]
    d:
      - [name, location]
    g:
      - [name, issue]
```