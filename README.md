```
# Informations de connexion
user = 'root'
password = ''

# Liste des bases de données
databases = ['BdD_RSC', 'BdD_RUN', 'BdD_RVC', 'BdD_SDC', 'BdD_SHC', 'BdD_SMP', 'BdD_STC', 'BdD_TLN', 'BdD_TLS', 'BdD_TRS', 'BdD_VRN', 'BdD_VTI']

# Requête SQL
query_template = "UPDATE bdd_{}_menu SET link = 'https://eureka.intradef.gouv.fr' where link = 'http://portail-eureka.intradef.gouv.fr/';"

# Générer les requêtes SQL dans un fichier
with open('update_queries.sql', 'w') as file:
    for database in databases:
        query = query_template.format(database[-3:])
        file.write(f"USE {database};\n")
        file.write(query + '\n')

```
