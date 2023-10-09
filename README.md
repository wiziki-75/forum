import mysql.connector

# Informations de connexion
host = 'localhost'
user = 'root'
password = ''
databases = ['BdD_RSC', 'BdD_RUN', 'BdD_RVC', 'BdD_SDC', 'BdD_SHC', 'BdD_SMP', 
             'BdD_STC', 'BdD_TLN', 'BdD_TLS', 'BdD_TRS', 'BdD_VRN', 'BdD_VTI']

# Requête SQL
query_template = "UPDATE bdd_{}_menu SET link = 'https://eureka.intradef.gouv.fr' where link = 'http://portail-eureka.intradef.gouv.fr/';"

# Connexion à la base de données et exécution de la requête
for database in databases:
    try:
        connection = mysql.connector.connect(host=host, user=user, password=password, database=database)
        cursor = connection.cursor()
        query = query_template.format(database[-3:])
        cursor.execute(query)
        connection.commit()
        print(f"La requête a été exécutée avec succès sur la base de données {database}.")
    except Exception as e:
        print(f"Erreur lors de l'exécution de la requête sur la base de données {database}: {e}")
    finally:
        cursor.close()
        connection.close()
